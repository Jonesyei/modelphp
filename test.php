<script type="text/javascript" src="includes/js/jquery.js"></script>
<script>
(function($){
    $.fn.extend({
        numAnim: function(options) {
            if ( ! this.length)
                return false;

            this.defaults = {
                endAt: 2560,
                numClass: 'autogen-num',
                duration: 5,   // seconds
                interval: 90  // ms
            };
            var settings = $.extend({}, this.defaults, options);

            var $num = $('<span/>', {
                'class': settings.numClass 
            });

            return this.each(function() {
				_rr = $this;
                var $this = $(this);

                // Wrap each number in a tag.
                var frag = document.createDocumentFragment(),
                    numLen = settings.endAt.toString().length;
                for (x = 0; x < numLen; x++) {
                    var rand_num = Math.floor( Math.random() * 10 );
                    frag.appendChild( $num.clone().text(rand_num)[0] )
                }
                $this.empty().append(frag);

                var get_next_num = function(num) {
                    ++num;
                    if (num > 9) return 0;
                    return num;
                };

                //---亂樹跳動動畫設定
                $this.find('.' + settings.numClass).each(function() {
                    var $num = $(this),
                        num = parseInt( $num.text() );

                    var interval = setInterval( function() {
                        num = get_next_num(num);
                        $num.text(num);
                    }, settings.interval);

                    setTimeout( function() {
                        clearInterval(interval);
                    }, settings.duration * 1000 - settings.interval);
                });
				
				//--最後成為結果
                setTimeout( function() {
                    $this.text( settings.endAt.toString() );
                }, settings.duration * 1000);
            });
        }
    });
})(jQuery);
</script>

<span id="number"></span>
<span id="number2"></span>
<script>
$("#number").numAnim({
    endAt: Math.floor( Math.random() * 10 ),
    duration: 5
});
$("#number2").numAnim({
    endAt: 2,
    duration: 3
});
</script>