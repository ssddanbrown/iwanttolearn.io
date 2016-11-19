<template>

  <div class="tag-page">
    <div class="page-header">
        <div class="container">
            <h1>Learn About <transition appear name="slide-fade"><span v-if="tag">{{ tag.name }}</span></transition></h1>
        </div>
    </div>

    <div class="hero-section tight">
        <div class="container">

            <div class="col-md-9">
                <div class="row group-container masonry">

                  <transition name="list-glide" appear tag="div">
                    <div v-if="tag">
                      <div v-for="format in resourcesGrouped" :key="format.slug" class="masonry-item col-md-4 col-sm-6 col-xs-12">
                          <div class="panel panel-primary">
                              <div class="panel-heading">
                                  <i :class="`fa fa-${format.icon}`"></i>
                                  {{ format.plural }}
                              </div>
                              <div class="list-group">
                                  <a v-for="resource in format.resources" :key="resource.name" class="list-group-item" target="_blank" rel="noopener" :href="resource.link">
                                      {{ resource.name }}
                                      <!-- TODO - Add tooltip -->
                                      <div v-if="resource.cost !== 'free'" class="pull-right tooltip">
                                          <i class="fa fa-money"></i>
                                          <span v-if="resource.cost === 'paid'">This resource costs to use</span>
                                          <span v-if="resource.cost === 'free+paid'">Free and paid options available</span>
                                      </div>
                                      
                                      <br/>
                                      <span class="small">
                                          {{ resource.shortLink }}
                                      </span>
                                  </a>
                              </div>
                          </div>
                      </div>  
                    </div>
                  </transition>

                </div>
            </div>

            <div class="col-md-3">
                <div class="panel panel-primary-light">
                    <div class="panel-heading">
                        <i class="fa fa-tags"></i> Related Topics
                    </div>
                    <div class="list-group">
                      
                      <template v-if="lastRelated && lastRelated.length > 0">
                        <transition-group appear name="list-complete" tag="div">
                          <router-link v-for="relatedTag in lastRelated" :key="relatedTag.slug" class="list-group-item list-complete-item" :to="`/t/${relatedTag.slug}`">
                              {{ relatedTag.name }} <i class="fa fa-tag pull-right"></i>
                              <br/>
                              <span class="small">
                                  {{ relatedTag.resourceCount }} Resources Available
                              </span>
                          </router-link>
                        </transition-group> 
                      </template>
                      <template v-else>
                        <div class="list-group-item text-muted">
                          No related tags available
                        </div>
                      </template>
                        
                    </div>
                </div>
                <social-panel :url="url" :text="`Learn About ${shareName}`"></social-panel>
            </div>

        </div>
    </div>
  </div>

</template>

<script>
import axios from 'axios'

import SocialPanel from '../components/SocialPanel'

export default {
  name: 'format',
  components: {SocialPanel},

  created () {
    let tag = this.$route.params.tag;
    this.loadTag(tag)
  },

  data () {
    return {
      tag: false,
      lastRelated: false
    }
  },

  computed: {
    url() {
      var url = window.location.href.split("/");
      if (this.tag) {
        return url[0] + "//" + url[2] + '/t/' + this.tag.slug;
      }
      return url[0] + "//" + url[2];
    },
    shareName() {
      return (this.tag) ? this.tag.name : 'Programming Topics';
    },
    resourcesGrouped() {
        if (!this.tag || !this.tag.resources) return [];
        let final = {};
        this.tag.resources.forEach((elem, i) => {
            let formats = elem.formats;
            formats.forEach(format => {
              if (typeof final[format.slug] === 'undefined') {
                final[format.slug] = format;
                final[format.slug].resources = [];
              } 
              final[format.slug].resources.push(elem);
            });
        });
        return final;
    },
  },

  methods: {
    loadTag(tag) {
      tag = tag.toLowerCase();
      axios.get(`/static/api/tags/${tag}.json`).then(resp => {
        this.tag = resp.data;
        this.lastRelated = resp.data.related;
      })
    }
  },


  watch: {
    '$route' (to, from) {
      this.tag = false;
      this.loadTag(this.$route.params.tag);
    }
  }
}
</script>