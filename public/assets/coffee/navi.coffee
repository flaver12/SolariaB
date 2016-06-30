

class Navi

    constructor: (@name) ->

    setUpNav: ->
        for item in @name
            do (item) ->
                $('ul.navbar-nav').append('<li><a id="fromstorm_12" href="/test">'+item+'</a></li>');

    log: ->
        console.log(@name)
