const fs = require('fs');
const path = require('path');
const outDir = path.join(__dirname, '../static/api');

let formats = require('../data/formats.json');
let resources = require('../data/resources.json');
let tags = require('../data/tags.json');

// Append slugs & sort
formats.forEach(generateSlug);
formats.sort(sortByName);
tags.forEach(generateSlug);
tags.sort(sortByName);
resources.sort(sortByName);

// Check duplicates
checkForDuplicates(formats, 'Formats');
checkForDuplicates(tags, 'Tags');
checkForDuplicates(resources, 'Resources');

// Create short links
resources.forEach(item => {
    item.shortLink = (item.link.length > 31) ? item.link.slice(0, 28) + '...' : item.link;
});

// Check related tags are valid
tags.forEach(tag => {
    tag.related.forEach(related => {
        let exists = (related !== tag.name) && tags.filter(a => {return a.slug === related}).length > 0;
        if (!exists) throw new Error(`Related tag '${related}', Found on tag '${tag.name}' does not exist.`)
    });
});

// Render out tags and formats
fs.writeFileSync(`${outDir}/tags.json`, JSON.stringify(tags, null, 2));
fs.writeFileSync(`${outDir}/formats.json`, JSON.stringify(formats, null, 2));

// Add tags to resources
let resourcesCopy = JSON.parse(JSON.stringify(resources));
resourcesCopy.forEach(resource => {
    let newTags = [];
    resource.tags.forEach(tagSlug => {
        let tagSearch = tags.filter(tag => {return tag.slug === tagSlug});
        if (tagSearch.length === 0) throw new Error(`Resource '${resource.name}' has an inexistant tag '${tagSlug}'`);
        newTags.push(tagSearch[0]);
    });
    resource.tags = newTags;
});

// Build format objects
let formatsCopy = JSON.parse(JSON.stringify(formats));
checkDirExists(`${outDir}/formats`);
formatsCopy.forEach(format => {
    format.resources = resourcesCopy.filter(resource => {
        return resource.formats.indexOf(format.slug) !== -1;
    });
    fs.writeFileSync(`${outDir}/formats/${format.slug}.json`, JSON.stringify(format, null, 2));
});

// Build tag objects
let tagsCopy = JSON.parse(JSON.stringify(tags));
checkDirExists(`${outDir}/tags`);
// Add formats into resources
resources.forEach(resource => {
    resource.formats = resource.formats.map(format => {
        let search = formats.filter(f => {return f.slug === format});
        if (search.length === 0) throw new Error(`Format '${format}' not found in formats list. Occurred on '${resource.name}' resource`);
        return search[0];
    });
});
tagsCopy.forEach(tag => {
    tag.resources = resources.filter(resource => {
        return resource.tags.indexOf(tag.slug) !== -1;
    });
    tag.related = tag.related.map(related => {
        let search = tags.filter(t => { return t.slug === related});
        if (search.length === 0) throw new Error(`Tag '${related}' not found in tags list. Occured on relations of '${tag}' tag.`);
        return search[0];
    });
    fs.writeFileSync(`${outDir}/tags/${tag.slug}.json`, JSON.stringify(tag, null, 2));
});

function generateSlug(item) {
    item.slug = item.name.toLowerCase().replace(/\s/ig, '-').replace(/[\+\/\\\?\@\}\{\.\,\=\[\]\#\&\!\*\'\;\:\$\%]/ig, '');
}

function sortByName(a, b) {
    return a.name.toUpperCase() < b.name.toUpperCase() ? -1 : 1;
}

function checkForDuplicates(items, listName) {
    let names = {};
    items.forEach(item => {
        if (typeof names[item.name] !== 'undefined') throw new Error(`Duplicate name '${item.name}' in '${listname}' array.`);
        names[item.name] = true;
    });
}

function checkDirExists(folder) {
    try {
        fs.accessSync(folder, fs.F_OK);
    } catch (e) {
        fs.mkdirSync(folder);
    }
}