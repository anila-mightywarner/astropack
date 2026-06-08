$(document).ready(function () {

    /*
     * Generate canonical name for news/event name
     */
    $('#newsevents-title').keyup(function () {
        var name = slug($(this).val());
        $('#newsevents-canonical_name').val(name);
    });
    /*
     * Generate canonical name for sevice name
     */
    $('#services-service_title').keyup(function () {
        var name = slug($(this).val());
        $('#services-canonical_name').val(name);
    });
    /*
     * Generate canonical name for product name
     */
    $('#products-product_title').keyup(function () {
        var name = slug($(this).val());
        $('#products-canonical_name').val(name);
    });
    /*
     * Generate canonical name for category name
     */
    $('#category-category_name').keyup(function () {
        var name = slug($(this).val());
        $('#category-canonical_name').val(name);
    });
    /*
     * Generate canonical name for subcategory name
     */
    $('#subcategory-sub_category').keyup(function () {
        var name = slug($(this).val());
        $('#subcategory-canonical_name').val(name);
    });
    /*
     * Generate canonical name for brand name
     */
    $('#brands-brand_name').keyup(function () {
        var name = slug($(this).val());
        $('#brands-canonical_name').val(name);
    });
    /*
     * Generate canonical name for blog name
     */
    $('#blogs-title').keyup(function () {
        var name = slug($(this).val());
        $('#blogs-canonical_name').val(name);
    });

    $('#products-category').change(function () {
        var category = $(this).val();
        $.ajax({
            type: 'POST',
            cache: false,
            data: {category: category},
            url: homeUrl + "cms/products/get-category",
            success: function (data) {
                $('#products-sub_category').html(data);
            }
        });
    });

});
var slug = function (str) {
    var $slug = '';
    var trimmed = $.trim(str);
    $slug = trimmed.replace(/[^a-z0-9-]/gi, '-').
            replace(/-+/g, '-').
            replace(/^-|-$/g, '');
    return $slug.toLowerCase();
}


