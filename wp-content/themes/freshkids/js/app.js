$( function() {
    // init Isotope
    var $container = $('.blog_index_list').isotope({
        itemSelector: '.item'
    });

    // store filter for each group
    var filters = {};

    $('#filters').on( 'click', '.btn-sort', function() {
        var $this = $(this);
        // get group key
        var $buttonGroup = $this.parents('.filter_items');
        var filterGroup = $buttonGroup.attr('data-filter-group');
        // set filter for group
        filters[ filterGroup ] = $this.attr('data-filter');
        // combine filters
        var filterValue = '';
        for ( var prop in filters ) {
            filterValue += filters[ prop ];
        }
        // set filter for Isotope
        $container.isotope({ filter: filterValue });
    });

    // change is-checked class on buttons
    $('.filter_items').each( function( i, buttonGroup ) {
        var $buttonGroup = $( buttonGroup );
        $buttonGroup.on( 'click', 'button', function() {
            $buttonGroup.find('.active').removeClass('active');
            $( this ).addClass('active');
        });
    });

});

$( function() {
    $('button').on('click', function(){
        if($(this).closest("li .product_item").hasClass( "active" )) {
            $(this).closest("li .product_item").removeClass( "active" );
            $(this).closest("li .product_item").addClass( "inactive" );
            $(this).closest("li").children("div.product_item1").removeClass( "inactive" );
            $(this).closest("li").children("div.product_item1").addClass( "active" );
        }

        if($(this).closest("li .product_item1").hasClass( "active" )) {
            $(this).closest("li .product_item1").removeClass( "active" );
            $(this).closest("li .product_item1").addClass( "inactive" );
            $(this).closest("li").children("div.product_item").removeClass( "inactive" );
            $(this).closest("li").children("div.product_item").addClass( "active" );
        }

    });

});
//masonry layout using istope
/*$(function(){
    //grid is container for all moms post
    var container = document.querySelector('#grid'),
    colWidth = function(){
        var w = $(container).width(),
            columnNum = 1,
            columnWidth = 0;
        if(w > 1200) {
            columnNum = 4;
        } else if (w > 900) {
            columnNum = 3;
        } else if (w > 600){
            columnNum = 2;
        }else if(w > 300) {
            columnNum =1;
        }
        columnWidth = Math.floor(w/columnNum);
        return columnWidth;
    },
        isotope = function() {
            if (container) {
                imagesLoaded(container, function () {
                    $(container).isotope({
                        resizable: false,
                        itemSelector: '.news_item_box',
                        masonry: {
                            columnWidth: '.size-1of4',
                            gutterWidth : 4
                        }
                    });
                });
            }
        };

         isotope();
        //$(window).smartresize(isotope);

        $('#grid').infinitescroll({
                navSelector: "div.pagination",
                nextSelector: "div.pagination a.next",
                itemSelector: "#grid news_item_box",
                debug: true,
            },
            function(newElements) {
                var $newElems = $(newElements);
                imagesLoaded(container, function() {
                    msnry.appended($newElems);
                });
            });
});*/

$(function(){
    $('#grid').infinitescroll({
            navSelector: "div.pagination",
            nextSelector: "div.pagination a.next",
            itemSelector: "#grid news_item_box",
            debug: true,
        },
        function(newElements) {
            var $newElems = $(newElements);
            imagesLoaded(container, function() {
                msnry.appended($newElems);
            });
        });
});