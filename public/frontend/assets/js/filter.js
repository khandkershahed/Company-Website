// // $.ajaxSetup({
// //     headers: {
// //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
// //     }
// // });

// // var filterForm = $('.filterForm');
// // var filterContainer = $('.filter_container');
// // var selectedBrands = $('.selected_brands');
// // var spinner = '<div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div>';

// // function applyFilters(page = 1) {
// //     var formData = filterForm.serialize() + '&page=' + page;
// //     filterContainer.html(spinner);

// //     $.ajax({
// //         url: filterForm.attr('action'),
// //         type: 'GET',
// //         data: formData,
// //         dataType: 'json',
// //         success: function (data) {
// //             filterContainer.html(data.productListHtml);
// //             updatePagination(data.pagination);
// //         },
// //         error: function (xhr, status, error) {
// //             console.error(xhr.responseText);
// //         }
// //     });
// // }

// // function brandFilter(page = 1) {
// //     var formData = filterForm.serialize() + '&page=' + page;
// //     filterContainer.html(spinner);
// //     selectedBrands.html(spinner);

// //     $.ajax({
// //         url: filterForm.attr('action'),
// //         type: 'GET',
// //         data: formData,
// //         dataType: 'json',
// //         success: function (data) {
// //             if (data.filteredBrandsHtml) {
// //                 selectedBrands.empty();
// //                 selectedBrands.html(data.filteredBrandsHtml);
// //                 // $('.filtered_brands').empty();
// //                 filterContainer.html(data.productListHtml);
// //             } else {
// //                 filterContainer.html(data.productListHtml);
// //             }
// //             updatePagination(data.pagination);
// //         },
// //         error: function (xhr, status, error) {
// //             console.error(xhr.responseText);
// //         }
// //     });
// // }

// // function updateFilters() {
// //     applyFilters();
// //     brandFilter();
// // }

// // filterForm.find('input:not(#brand_search), select, #amount').on('keyup change', function (e) {
// //     e.preventDefault();
// //     updateFilters();
// //     // alert('Filter Form');
// // });

// // $(document).on('click', '#pagination .page-link', function (e) {
// //     e.preventDefault();
// //     var page = $(this).data('page');
// //     applyFilters(page);
// // });

// // if ($('#slider-range').length > 0) {
// //     const max_price = parseInt($('#slider-range').data('max'));
// //     const min_price = parseInt($('#slider-range').data('min'));
// //     let price_range = min_price + "-" + max_price;

// //     let price = price_range.split('-');

// //     $("#slider-range").slider({
// //         range: true,
// //         min: min_price,
// //         max: max_price,
// //         values: price,
// //         slide: function (event, ui) {
// //             $("#amount").val('$' + ui.values[0] + "-" + '$' + ui.values[1]);
// //             $("#price_range").val(ui.values[0] + "-" + ui.values[1]);
// //         },
// //         change: function (event, ui) {
// //             updateFilters();
// //         }
// //     });
// // }

// // function updatePagination(pagination) {
// //     var paginationContainer = $('#pagination');
// //     paginationContainer.empty();

// //     var totalPages = pagination.last_page;
// //     var currentPage = pagination.current_page;
// //     var visiblePages = 7; // Number of visible pagination links
// //     var halfVisible = Math.floor(visiblePages / 2);
// //     var startPage, endPage;

// //     if (totalPages <= visiblePages) {
// //         // Show all pages if total pages are less than or equal to visible pages
// //         startPage = 1;
// //         endPage = totalPages;
// //     } else if (currentPage <= halfVisible) {
// //         // Show first 'visiblePages' pages if current page is in the first half
// //         startPage = 1;
// //         endPage = visiblePages;
// //     } else if (currentPage >= totalPages - halfVisible) {
// //         // Show last 'visiblePages' pages if current page is in the last half
// //         startPage = totalPages - visiblePages + 1;
// //         endPage = totalPages;
// //     } else {
// //         // Show a range of 'visiblePages' pages with current page in the middle
// //         startPage = currentPage - halfVisible;
// //         endPage = currentPage + halfVisible;
// //     }

// //     // Add the "Previous" link
// //     if (currentPage > 1) {
// //         paginationContainer.append('<li class="page-item"><a class="page-link" href="#" data-page="' + (currentPage - 1) + '">Previous</a></li>');
// //     } else {
// //         paginationContainer.append('<li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>');
// //     }

// //     // Add the page links
// //     for (var i = startPage; i <= endPage; i++) {
// //         if (i === currentPage) {
// //             paginationContainer.append('<li class="page-item active"><a class="page-link" href="#" data-page="' + i + '">' + i + '</a></li>');
// //         } else {
// //             paginationContainer.append('<li class="page-item"><a class="page-link" href="#" data-page="' + i + '">' + i + '</a></li>');
// //         }
// //     }

// //     // Add the "Next" link
// //     if (currentPage < totalPages) {
// //         paginationContainer.append('<li class="page-item"><a class="page-link" href="#" data-page="' + (currentPage + 1) + '">Next</a></li>');
// //     } else {
// //         paginationContainer.append('<li class="page-item disabled"><a class="page-link" href="#">Next</a></li>');
// //     }
// // }

// // // Attach event listeners to other filter inputs
// // filterForm.find('input:not(.brand_search), select, #amount').on('keyup change', function() {
// //     updateURL();
// //     updateFilters();
// // });

// // // Attach event listeners to pagination links
// // $(document).on('click', '#pagination .page-link', function (e) {
// //     e.preventDefault();
// //     var page = $(this).data('page');
// //     updateURL(page);
// //     applyFilters(page);
// // });

// $.ajaxSetup({
//     headers: {
//         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//     }
// });

// var filterForm = $('.filterForm');
// var filterContainer = $('.filter_container');
// var selectedBrands = $('.selected_brands');
// var spinner = '<div class="d-flex spinner-border text-primary text-center justify-content-center align-item-center" role="status"><span class="visually-hidden">Loading...</span></div>';

// function applyFilters(page = 1) {
//     var formData = filterForm.serialize() + '&page=' + page;
//     filterContainer.html(spinner);
//     $.ajax({
//         url: filterForm.attr('action'),
//         type: 'GET',
//         data: formData,
//         dataType: 'json',
//         success: function (data) {
//             filterContainer.html(data.productListHtml);
//             updatePagination(data.pagination);
//         },
//         error: function (xhr, status, error) {
//             console.error(xhr.responseText);
//         }
//     });
// }

// function brandFilter(page = 1) {
//     var formData = filterForm.serialize() + '&page=' + page;
//     filterContainer.html(spinner);
//     selectedBrands.html(spinner);
//     $.ajax({
//         url: filterForm.attr('action'),
//         type: 'GET',
//         data: formData,
//         dataType: 'json',
//         success: function (data) {
//             if (data.filteredBrandsHtml) {
//                 selectedBrands.html(data.filteredBrandsHtml);
//                 $('.filtered_brands').empty();
//                 filterContainer.html(data.productListHtml);
//             } else {
//                 filterContainer.html(data.productListHtml);
//             }
//             updatePagination(data.pagination);
//         },
//         error: function (xhr, status, error) {
//             console.error(xhr.responseText);
//         }
//     });
// }

// function updateFilters() {
//     applyFilters();
//     brandFilter();
// }

// filterForm.find('input:not(.brand_search), select, #amount').on('keyup change', function (e) {
//     e.preventDefault();
//     updateFilters();
//     alert('Filter Form');
// });

// $(document).on('click', '#pagination .page-link', function (e) {
//     e.preventDefault();
//     var page = $(this).data('page');
//     applyFilters(page);
// });

// if ($('#slider-range').length > 0) {
//     const max_price = parseInt($('#slider-range').data('max'));
//     const min_price = parseInt($('#slider-range').data('min'));
//     let price_range = min_price + "-" + max_price;

//     let price = price_range.split('-');

//     $("#slider-range").slider({
//         range: true,
//         min: min_price,
//         max: max_price,
//         values: price,
//         slide: function (event, ui) {
//             $("#amount").val('$' + ui.values[0] + "-" + '$' + ui.values[1]);
//             $("#price_range").val(ui.values[0] + "-" + ui.values[1]);
//         },
//         change: function (event, ui) {
//             updateFilters();
//         }
//     });
// }

// function updatePagination(pagination) {
//     var paginationContainer = $('#pagination');
//     paginationContainer.empty();

//     var totalPages = pagination.last_page;
//     var currentPage = pagination.current_page;
//     var visiblePages = 7; // Number of visible pagination links
//     var halfVisible = Math.floor(visiblePages / 2);
//     var startPage, endPage;

//     if (totalPages <= visiblePages) {
//         // Show all pages if total pages are less than or equal to visible pages
//         startPage = 1;
//         endPage = totalPages;
//     } else if (currentPage <= halfVisible) {
//         // Show first 'visiblePages' pages if current page is in the first half
//         startPage = 1;
//         endPage = visiblePages;
//     } else if (currentPage >= totalPages - halfVisible) {
//         // Show last 'visiblePages' pages if current page is in the last half
//         startPage = totalPages - visiblePages + 1;
//         endPage = totalPages;
//     } else {
//         // Show a range of 'visiblePages' pages with current page in the middle
//         startPage = currentPage - halfVisible;
//         endPage = currentPage + halfVisible;
//     }

//     // Add the "Previous" link
//     if (currentPage > 1) {
//         paginationContainer.append('<li class="page-item"><a class="page-link" href="#" data-page="' + (currentPage - 1) + '">Previous</a></li>');
//     } else {
//         paginationContainer.append('<li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>');
//     }

//     // Add the page links
//     for (var i = startPage; i <= endPage; i++) {
//         if (i === currentPage) {
//             paginationContainer.append('<li class="page-item active"><a class="page-link" href="#" data-page="' + i + '">' + i + '</a></li>');
//         } else {
//             paginationContainer.append('<li class="page-item"><a class="page-link" href="#" data-page="' + i + '">' + i + '</a></li>');
//         }
//     }

//     // Add the "Next" link
//     if (currentPage < totalPages) {
//         paginationContainer.append('<li class="page-item"><a class="page-link" href="#" data-page="' + (currentPage + 1) + '">Next</a></li>');
//     } else {
//         paginationContainer.append('<li class="page-item disabled"><a class="page-link" href="#">Next</a></li>');
//     }
// }

// $.ajaxSetup({
//     headers: {
//         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//     }
// });

// var filterForm = $('.filterForm');
// var filterContainer = $('.filter_container');
// var selectedBrands = $('.selected_brands');
// var spinner = '<div class="d-flex spinner-border text-primary text-center justify-content-center align-item-center" role="status"><span class="visually-hidden">Loading...</span></div>';

// function applyFilters(page = 1) {
//     var formData = filterForm.serialize() + '&page=' + page;
//     filterContainer.html(spinner);
//     $.ajax({
//         url: filterForm.attr('action'),
//         type: 'GET',
//         data: formData,
//         dataType: 'json',
//         success: function (data) {
//             filterContainer.html(data.productListHtml);
//             updatePagination(data.pagination);
//         },
//         error: function (xhr, status, error) {
//             console.error(xhr.responseText);
//         }
//     });
// }

// function brandFilter(page = 1) {
//     var formData = filterForm.serialize() + '&page=' + page;
//     filterContainer.html(spinner);
//     selectedBrands.html(spinner);
//     $.ajax({
//         url: filterForm.attr('action'),
//         type: 'GET',
//         data: formData,
//         dataType: 'json',
//         success: function (data) {
//             if (data.filteredBrandsHtml) {
//                 selectedBrands.html(data.filteredBrandsHtml);
//                 $('.filtered_brands').empty();
//                 filterContainer.html(data.productListHtml);
//             } else {
//                 filterContainer.html(data.productListHtml);
//             }
//             updatePagination(data.pagination);
//         },
//         error: function (xhr, status, error) {
//             console.error(xhr.responseText);
//         }
//     });
// }

// function updateFilters(page = 1) {
//     applyFilters(page);
//     brandFilter(page);
// }

// function updatePerPage() {
//     updateFilters();
// }

// function updateSortBy() {
//     updateFilters();
// }

// filterForm.find('input:not(.brand_search), select, #amount').on('keyup change', function () {
//     updateFilters();
// });

// $(document).on('click', '#pagination .page-link', function (e) {
//     e.preventDefault();
//     var page = $(this).data('page');
//     updateFilters(page);
// });

// $('.show').on('change', function () {
//     updatePerPage();
// });

// $('[name="sortBy"]').on('change', function () {
//     updateSortBy();
// });

// if ($('#slider-range').length > 0) {
//     const max_price = parseInt($('#slider-range').data('max'));
//     const min_price = parseInt($('#slider-range').data('min'));
//     let price_range = min_price + "-" + max_price;

//     let price = price_range.split('-');

//     $("#slider-range").slider({
//         range: true,
//         min: min_price,
//         max: max_price,
//         values: price,
//         slide: function (event, ui) {
//             $("#amount").val('$' + ui.values[0] + "-" + '$' + ui.values[1]);
//             $("#price_range").val(ui.values[0] + "-" + ui.values[1]);
//         },
//         change: function (event, ui) {
//             updateFilters();
//         }
//     });
// }

// function updatePagination(pagination) {
//     var paginationContainer = $('#pagination');
//     paginationContainer.empty();

//     var totalPages = pagination.last_page;
//     var currentPage = pagination.current_page;
//     var visiblePages = 7; // Number of visible pagination links
//     var halfVisible = Math.floor(visiblePages / 2);
//     var startPage, endPage;

//     if (totalPages <= visiblePages) {
//         // Show all pages if total pages are less than or equal to visible pages
//         startPage = 1;
//         endPage = totalPages;
//     } else if (currentPage <= halfVisible) {
//         // Show first 'visiblePages' pages if current page is in the first half
//         startPage = 1;
//         endPage = visiblePages;
//     } else if (currentPage >= totalPages - halfVisible) {
//         // Show last 'visiblePages' pages if current page is in the last half
//         startPage = totalPages - visiblePages + 1;
//         endPage = totalPages;
//     } else {
//         // Show a range of 'visiblePages' pages with current page in the middle
//         startPage = currentPage - halfVisible;
//         endPage = currentPage + halfVisible;
//     }

//     // Add the "Previous" link
//     if (currentPage > 1) {
//         paginationContainer.append('<li class="page-item"><a class="page-link" href="#" data-page="' + (currentPage - 1) + '">Previous</a></li>');
//     } else {
//         paginationContainer.append('<li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>');
//     }

//     // Add the page links
//     for (var i = startPage; i <= endPage; i++) {
//         if (i === currentPage) {
//             paginationContainer.append('<li class="page-item active"><a class="page-link" href="#" data-page="' + i + '">' + i + '</a></li>');
//         } else {
//             paginationContainer.append('<li class="page-item"><a class="page-link" href="#" data-page="' + i + '">' + i + '</a></li>');
//         }
//     }

//     // Add the "Next" link
//     if (currentPage < totalPages) {
//         paginationContainer.append('<li class="page-item"><a class="page-link" href="#" data-page="' + (currentPage + 1) + '">Next</a></li>');
//     } else {
//         paginationContainer.append('<li class="page-item disabled"><a class="page-link" href="#">Next</a></li>');
//     }
// }

// $.ajaxSetup({
//     headers: {
//         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//     }
// });

// var filterForm = $('.filterForm');
// var filterContainer = $('.filter_container');
// var selectedBrands = $('.selected_brands');
// var spinner = '<div class="d-flex spinner-border text-primary text-center justify-content-center align-item-center" role="status"><span class="visually-hidden">Loading...</span></div>';

// function applyFilters(page = 1) {
//     var formData = filterForm.serialize() + '&page=' + page;
//     filterContainer.html(spinner);
//     $.ajax({
//         url: filterForm.attr('action'),
//         type: 'GET',
//         data: formData,
//         dataType: 'json',
//         success: function (data) {
//             filterContainer.html(data.productListHtml);
//             updatePagination(data.pagination);
//             selectedBrands.html(data.filteredBrandsHtml);
//         },
//         error: function (xhr, status, error) {
//             console.error(xhr.responseText);
//         }
//     });
// }

// function brandFilter(page = 1) {
//     var formData = filterForm.serialize() + '&page=' + page;
//     filterContainer.html(spinner);
//     selectedBrands.html(spinner);
//     $.ajax({
//         url: filterForm.attr('action'),
//         type: 'GET',
//         data: formData,
//         dataType: 'json',
//         success: function (data) {
//             if (data.filteredBrandsHtml) {
//                 selectedBrands.html(data.filteredBrandsHtml);
//                 $('.filtered_brands').empty();
//                 filterContainer.html(data.productListHtml);
//             } else {
//                 filterContainer.html(data.productListHtml);
//             }
//             updatePagination(data.pagination);
//         },
//         error: function (xhr, status, error) {
//             console.error(xhr.responseText);
//         }
//     });
// }

// function updateFilters(page = 1) {
//     applyFilters(page);
//     brandFilter(page);
// }

// function updatePerPage() {
//     var formData = filterForm.serialize() + '&per_page=' + $('.show').val();
//     updateFilters(1);
// }

// function updateSortBy() {
//     var formData = filterForm.serialize() + '&sort_by=' + $('[name="sortBy"]').val();
//     updateFilters(1);
// }

// filterForm.find('input:not(.brand_search), select, #amount').on('keyup change', function () {
//     updateFilters();
// });

// $(document).on('click', '#pagination .page-link', function (e) {
//     e.preventDefault();
//     var page = $(this).data('page');
//     updateFilters(page);
// });

// function perpageFilter() {
//     updatePerPage();
// };

// function sortByFilter() {
//     updateSortBy();
// };

// if ($('#slider-range').length > 0) {
//     const max_price = parseInt($('#slider-range').data('max'));
//     const min_price = parseInt($('#slider-range').data('min'));
//     let price_range = min_price + '-' + max_price;

//     let price = price_range.split('-');

//     $("#slider-range").slider({
//         range: true,
//         min: min_price,
//         max: max_price,
//         values: price,
//         slide: function (event, ui) {
//             $("#amount").val('$' + ui.values[0] + '-' + '$' + ui.values[1]);
//             $("#price_range").val(ui.values[0] + '-' + ui.values[1]);
//         },
//         change: function (event, ui) {
//             updateFilters();
//         }
//     });
// }

// function updatePagination(pagination) {
//     var paginationContainer = $('#pagination');
//     paginationContainer.empty();

//     var totalPages = pagination.last_page;
//     var currentPage = pagination.current_page;
//     var visiblePages = 7; // Number of visible pagination links
//     var halfVisible = Math.floor(visiblePages / 2);
//     var startPage, endPage;

//     if (totalPages <= visiblePages) {
//         // Show all pages if total pages are less than or equal to visible pages
//         startPage = 1;
//         endPage = totalPages;
//     } else if (currentPage <= halfVisible) {
//         // Show first 'visiblePages' pages if current page is in the first half
//         startPage = 1;
//         endPage = visiblePages;
//     } else if (currentPage >= totalPages - halfVisible) {
//         // Show last 'visiblePages' pages if current page is in the last half
//         startPage = totalPages - visiblePages + 1;
//         endPage = totalPages;
//     } else {
//         // Show a range of 'visiblePages' pages with current page in the middle
//         startPage = currentPage - halfVisible;
//         endPage = currentPage + halfVisible;
//     }

//     // Add the "Previous" link
//     if (currentPage > 1) {
//         paginationContainer.append('<li class="page-item"><a class="page-link" href="#" data-page="' + (currentPage - 1) + '">Previous</a></li>');
//     } else {
//         paginationContainer.append('<li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>');
//     }

//     // Add the page links
//     for (var i = startPage; i <= endPage; i++) {
//         if (i === currentPage) {
//             paginationContainer.append('<li class="page-item active"><a class="page-link" href="#" data-page="' + i + '">' + i + '</a></li>');
//         } else {
//             paginationContainer.append('<li class="page-item"><a class="page-link" href="#" data-page="' + i + '">' + i + '</a></li>');
//         }
//     }

//     // Add the "Next" link
//     if (currentPage < totalPages) {
//         paginationContainer.append('<li class="page-item"><a class="page-link" href="#" data-page="' + (currentPage + 1) + '">Next</a></li>');
//     } else {
//         paginationContainer.append('<li class="page-item disabled"><a class="page-link" href="#">Next</a></li>');
//     }
// }

$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

if ($("#slider-range").length > 0) {
    const max_price = parseInt($("#slider-range").data("max"));
    const min_price = parseInt($("#slider-range").data("min"));
    let price_range = min_price + "-" + max_price;

    let price = price_range.split("-");

    $("#slider-range").slider({
        range: true,
        min: min_price,
        max: max_price,
        values: price,
        slide: function (event, ui) {
            $("#amount").val("$" + ui.values[0] + "-" + "$" + ui.values[1]);
            $("#price_range").val(ui.values[0] + "-" + ui.values[1]);
        },
        change: function (event, ui) {
            applyFilters();
        },
    });
}

var filterForm = $(".filterForm");
var filterContainer = $(".filter_container");
var selectedBrands = $(".selected_brands");
var spinner = `
<div class="spinner-wrapper">
    <div class="modern-loader"></div>
    <div class="loading-text">Loading<span>.</span><span>.</span><span>.</span></div>
</div>
`;

function applyFilters(page = 1) {
    var formData = filterForm.serialize() + "&page=" + page;

    $.ajax({
        url: filterForm.attr("action"),
        type: "GET",
        data: formData,
        dataType: "json",
        success: function (data) {
            filterContainer.html(data.productListHtml);
            updatePagination(data.pagination);
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
        },
    });
}

function brandFilter(page = 1) {
    var formData = filterForm.serialize() + "&page=" + page;
    filterContainer.html(spinner);
    selectedBrands.html(spinner);
    $.ajax({
        url: filterForm.attr("action"),
        type: "GET",
        data: formData,
        dataType: "json",
        success: function (data) {
            if (data.filteredBrandsHtml) {
                selectedBrands.html(data.filteredBrandsHtml);
                $(".filtered_brands").empty();
                filterContainer.html(data.productListHtml);
            } else {
                filterContainer.html(data.productListHtml);
            }
            updatePagination(data.pagination);
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
        },
    });
}

function updateFilters(page = 1) {
    applyFilters(page);
    brandFilter(page);
}

function perpageFilter() {
    var formData = filterForm.serialize() + "&per_page=" + $(".show").val();
    updateFilters(1);
}

function sortByFilter() {
    var formData =
        filterForm.serialize() + "&sort_by=" + $('[name="sortBy"]').val();
    updateFilters(1);
}

filterForm
    .find("input:not(.brand_search), select, #amount")
    .on("keyup change", function () {
        updateFilters();
    });

$(document).on("click", "#pagination .page-link", function (e) {
    e.preventDefault();
    var page = $(this).data("page");
    updateFilters(page);
});

function updatePagination(pagination) {
    var paginationContainer = $("#pagination");
    paginationContainer.empty();

    var totalPages = pagination.last_page;
    var currentPage = pagination.current_page;
    var visiblePages = 7; // Number of visible pagination links
    var halfVisible = Math.floor(visiblePages / 2);
    var startPage, endPage;

    if (totalPages <= visiblePages) {
        // Show all pages if total pages are less than or equal to visible pages
        startPage = 1;
        endPage = totalPages;
    } else if (currentPage <= halfVisible) {
        // Show first 'visiblePages' pages if current page is in the first half
        startPage = 1;
        endPage = visiblePages;
    } else if (currentPage >= totalPages - halfVisible) {
        // Show last 'visiblePages' pages if current page is in the last half
        startPage = totalPages - visiblePages + 1;
        endPage = totalPages;
    } else {
        // Show a range of 'visiblePages' pages with current page in the middle
        startPage = currentPage - halfVisible;
        endPage = currentPage + halfVisible;
    }

    // Add the "Previous" link
    if (currentPage > 1) {
        paginationContainer.append(
            '<li class="page-item"><a class="page-link" href="#" data-page="' +
                (currentPage - 1) +
                '">Previous</a></li>'
        );
    } else {
        paginationContainer.append(
            '<li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>'
        );
    }

    // Add the page links
    for (var i = startPage; i <= endPage; i++) {
        if (i === currentPage) {
            paginationContainer.append(
                '<li class="page-item active"><a class="page-link" href="#" data-page="' +
                    i +
                    '">' +
                    i +
                    "</a></li>"
            );
        } else {
            paginationContainer.append(
                '<li class="page-item"><a class="page-link" href="#" data-page="' +
                    i +
                    '">' +
                    i +
                    "</a></li>"
            );
        }
    }

    // Add the "Next" link
    if (currentPage < totalPages) {
        paginationContainer.append(
            '<li class="page-item"><a class="page-link" href="#" data-page="' +
                (currentPage + 1) +
                '">Next</a></li>'
        );
    } else {
        paginationContainer.append(
            '<li class="page-item disabled"><a class="page-link" href="#">Next</a></li>'
        );
    }
}

//More Brand

$("button").on("click", function (ev) {
    var currentQty = $('input[name="quantity"]').val();
    var qtyDirection = $(this).data("direction");
    var newQty = 0;

    if (qtyDirection == "1") {
        newQty = parseInt(currentQty) + 1;
    } else if (qtyDirection == "-1") {
        newQty = parseInt(currentQty) - 1;
    }

    // make decrement disabled at 1
    if (newQty == 1) {
        $(".decrement-quantity").attr("disabled", "disabled");
    }

    // remove disabled attribute on subtract
    if (newQty > 1) {
        $(".decrement-quantity").removeAttr("disabled");
    }

    if (newQty > 0) {
        newQty = newQty.toString();
        $('input[name="quantity"]').val(newQty);
    } else {
        $('input[name="quantity"]').val("1");
    }
});
