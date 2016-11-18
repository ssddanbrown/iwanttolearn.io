<template>

<div class="format" v-if="format">

  <div class="page-header">
      <div class="container">
          <h1>Resources In {{ format.name }} Format</h1>
      </div>
  </div>

  <div class="hero-section tight">
      <div class="container">
          <h4><span class="text-primary"> <i :class="`fa fa-${format.icon}`"></i> </span>&nbsp;&nbsp;&nbsp; {{ format.resources.length }} Resources Available</h4>
          <br/><br/>

        <p v-if="!format.resources.length">Sorry, No resources are available in this format.</p>

        <div class="row" v-for="row in resourceRows">
            <div v-for="resource in row" class="col-md-4 col-sm-6">
                <format-resource :resource="resource"></format-resource>
            </div>
        </div>

      </div>
  </div>
</div>

</template>

<script>
import axios from 'axios'
import FormatResource from '../components/FormatResource'

export default {
  name: 'format',
  components: {FormatResource},

  created () {
    let format = this.$route.params.format;
    
    axios.get(`/static/api/formats/${format}.json`).then(resp => {
      this.format = resp.data;
    })
  },

  data () {
    return {
      format: false
    }
  },

  computed: {
    resourceRows() {
        if (typeof this.format.resources === 'undefined') return [];
        let final = [];
        this.format.resources.forEach((elem, i) => {
            let pos = Math.floor(i/3);
            if (typeof final[pos] === 'undefined') final[pos] = []; 
            final[pos].push(elem);
        });
        return final;
    }
  }
}
</script>