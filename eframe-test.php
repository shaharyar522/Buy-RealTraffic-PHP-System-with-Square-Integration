<div id="contentwrap">
    <div id="main">
        
        
                <div class="eb-white-area eb-mobile">
    <div class="eb-area-content">

    <h1>Framebreaker-test</h1>

    <p>
        This tool allows you to check whether your website uses a framebreaker. The following form will open a new window with 2 frames. Your website should be displayed in the bottom frame. If the upper frame disappears or is not visible, your website uses a framebreaker and can therefore not be published in the surfbar.
    </p>

    <div class="bootstrap">
                
        <p id="error-urls" class="fehler alert fade in" style="display: none;">
        </p>
    </div>

        <form method="get" class="yform columnar allowdoubleclick" target="_blank" action="" name="myform">
        <input type="hidden" name="token" value="(Ts��J�i�2�~�xVP���/*R��pYR��g��">
         <div class="type-text">
            <label for="url">URL(s)</label>
            <textarea rows="1" name="url" class="kontakt" id="url"></textarea>
        </div>

        <div class="bootstrap">
            <input id="sendurls" type="submit" value="Send!" class="btn btn-success" />
        </div>

    </form>

    <div class="type-text" id="linksarea"></div>

    <script id="hrefLinks" type="text/x-jsrender">
    <a target="_blank" href="{{>fullLink}}">{{>link}}</a><br>
    </script>

    <script>
        var observe;
        if (window.attachEvent) {
            observe = function (element, event, handler) {
                element.attachEvent('on'+event, handler);
            };
        }
        else {
            observe = function (element, event, handler) {
                element.addEventListener(event, handler, false);
            };
        }
        function init () {
            var text = document.getElementById('url');
            function resize () {
                text.style.height = 'auto';
                text.style.height = text.scrollHeight+'px';
            }
            /* 0-timeout to get the already changed text */
            function delayedResize () {
                window.setTimeout(resize, 0);
            }
            observe(text, 'change',  resize);
            observe(text, 'cut',     delayedResize);
            observe(text, 'paste',   delayedResize);
            observe(text, 'drop',    delayedResize);
            observe(text, 'keydown', delayedResize);

            text.focus();
            text.select();
            resize();
        }

        $(function () {
            init();

            $('#sendurls').click(function(e) {

                var hrefLinks = $.templates("#hrefLinks");

                $('#error-urls').empty();
                $('#linksarea').empty();

                //return false;
                e.preventDefault();


                var search_array = $('#url').val();
                console.log(search_array);


                $.ajax({
                    type: "POST",
                    url: '/ajax/url-test/checkUrl',
                    data: {"search_array" : search_array, "is_frametest" : "frametest"},
                    dataType: 'json',
                    success: function(data) {
                        var fullUrl = "";
                        var htmlLnks = "";

                        if (data.acceptedURL.length > 0) {

                            $('form[name=myform]').hide();

                            htmlLnks = "<br><br>";

                            $.each(data.acceptedURL, function(key,val){
                                fullUrl = window.location.href.substring(window.location.href.lastIndexOf('/') + 1) + "?url=" + encodeURIComponent(val);
                                htmlLnks += hrefLinks.render({fullLink:fullUrl, link:val});
                            });
                        }

                        if (data.rejectedURL.length > 0) {

                            $('#error-urls').show();

                            $.each(data.rejectedURL, function(key,val){
                                $('#error-urls').append('<span>[' + htmlspecialchars(val.url) + '] : ' + htmlspecialchars(val.cause) + '</span><br/>');
                            });

                        } else {
                            $('#error-urls').hide();
                        }

                        if (htmlLnks) {
                            $('#linksarea').append(htmlLnks);
                        }
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        console.log("fail.");
                    }
                });

            });
        });
    </script>

    </div>
</div>