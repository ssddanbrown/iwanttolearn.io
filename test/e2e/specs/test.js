// For authoring Nightwatch tests, see
// http://nightwatchjs.org/guide#usage

module.exports = {
  'page tests': function (browser) {
    // automatically uses dev Server port from /config.index.js
    // default: http://localhost:8080
    // see nightwatch.conf.js
    const devServer = browser.globals.devServerURL

    browser
      // Check home page
      .url(devServer)
      .waitForElementVisible('#app', 5000)
      .assert.elementPresent('.home')
      .assert.containsText('h1', 'I want to learn...')
      // .assert.elementCount('img', 1)

      // Check tag page
      .url(devServer + '/t/php')
      .waitForElementVisible('#app', 5000)
      .assert.elementPresent('.tag-page')
      .assert.elementPresent('.masonry-item')
      .assert.containsText('.masonry', 'Laracasts')


      // Check about page
      .url(devServer + '/about')
      .waitForElementVisible('#app', 5000)
      .assert.containsText('.panel', 'To collect the best resources for a vast range of subjects into a single point of reference.')

      // Check format page
      .url(devServer + '/f/video')
      .waitForElementVisible('#app', 5000)
      .assert.containsText('h1', 'Resources In Video Format')
      .assert.containsText('.format','Laracasts')

      .end()
  }
}
