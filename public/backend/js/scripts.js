$(document).ready(function () {
//notification
    function load_unseen_notification(notification) {
        var sendData = {
            notification:notification,
            _token: token
        };
        $.ajax({
            url: url + '/backend/contact-message',
            method: 'POST',
            data: sendData,
            success: function (data) {
                $('#menu1').html(data.data);
                if (data.count > 0) {
                    $('.unseen').html(data.count);
                }
            }
        });
    };
    load_unseen_notification();

    $(document).on('click', '.dropdown-toggle', function () {
        $('.unseen').html('');
        setInterval(function () {
            load_unseen_notification('yes');
        },10000);

    });

    //Delete
    $('tbody#userContent').on('click', 'button#delete', function () {
        var id = $(this).data('id');
        var sendData = {
            id: id,
            _token: token
        };
        alertify.confirm("Confirm Delete", "Are u sure!!", function () {
            $.ajax({

                url: url + '/backend/users/delete',
                method: 'POST',
                data: sendData,
                success: function (data) {
                    if (data.status == true) {
                        swal(
                            "Deleted",
                            data.msg,
                            "success");
                        location.reload();
                    }
                },
                error: function (err) {
                    if (data.status == false) {
                        swal(
                            "Error!!",
                            data.msg,
                            "error");
                    }
                }
            });
            return;
        }, function () {
            swal(
                "Action was Canceled");
        });
    });

    //changeUser Status
    $('tbody#userContent').on('click', 'button#status', function () {
        var id = $(this).data('id');
        var status = $(this).data('status');
        var sendData = {
            id: id,
            status: status,
            _token: token
        };
        alertify.confirm("Change Status", "Are u sure You want to change the user status!!", function () {
            $.ajax({

                url: url + '/backend/users/change-status',
                method: 'POST',
                data: sendData,
                success: function (data) {
                    if (data.status == true) {
                        swal(
                            "Status Changed Succesfully",
                            data.msg,
                            "success");
                        location.reload();
                    }
                },
                error: function (err) {
                    if (data.status == false) {
                        swal(
                            "Error!!",
                            data.msg,
                            "error");
                    }
                }
            });
            return;
        }, function () {
            swal(
                "Action was Canceled");
        });
    });

    //DeleteProduct
    $('tbody#productContent').on('click', 'button#delete', function () {
        var id = $(this).data('id');
        var sendData = {
            id: id,
            _token: token
        };
        alertify.confirm("Confirm Delete", "Are u sure!!", function () {
            $.ajax({
                url: url + '/backend/product/delete',
                method: 'POST',
                data: sendData,
                success: function (data) {
                    if (data.status == true) {
                        swal(
                            "Deleted",
                            data.msg,
                            "success");
                        location.reload();
                    }
                },
                error: function (err) {
                    if (data.status == false) {
                        swal(
                            "Error!!",
                            data.msg,
                            "error");
                    }
                }
            });
            return;
        }, function () {
            swal(
                "Action was Canceled");
        });
    });

    //productAvailability
    $('tbody#productContent').on('click', 'button#available', function () {
        var id = $(this).data('id');
        var available = $(this).data('available');
        var sendData = {
            id: id,
            available: available,
            _token: token
        };
        alertify.confirm("Change Status", "Are u sure You want to change the availablility of this product!!", function () {
            $.ajax({

                url: url + '/backend/product/change-availability',
                method: 'POST',
                data: sendData,
                success: function (data) {
                    if (data.status == true) {
                        swal(
                            "Status Changed Succesfully",
                            data.msg,
                            "success");
                        location.reload();
                    }
                },
                error: function (err) {
                    if (data.status == false) {
                        swal(
                            "Error!!",
                            data.msg,
                            "error");
                    }
                }
            });
            return;
        }, function () {
            swal(
                "Action was Canceled");
        });
    });

    //insertCategory
    $('#category').submit(function (e) {
        e.preventDefault();
        var sendData = getSubmittedValue();
        sendData._token = token;

        $.ajax({
            url: url + '/backend/category/add-category',
            method: 'POST',
            data: sendData,

            success: function (data) {
                if (data.status == true) {
                    document.getElementById('category').reset();
                    swal(
                        "Category Added",
                        data.msg,
                        "success");
                    getAllData();
                }
            },
            error: function (err) {
                if (err.status == false) {
                    swal(
                        "Oops...",
                        data.msg,
                        "error"
                    )
                }
            }
        });
    });

    //collection form data
    var getSubmittedValue = function () {

        var category_name = $('#category_name');
        var category_desc = $('#category_desc');

        var ajaxSendData = {};
        ajaxSendData.category_name = category_name.val();
        ajaxSendData.category_desc = category_desc.val();
        return ajaxSendData;
    };
    //Select
    var getAllData = function () {
        $.getJSON(url + '/backend/category/select-category', {},
            function (data) {
                if (data.status === true) {
                    $('tbody#categories').html(data.data);
                }
            }).fail(function (err) {
            console.log(err);
        });
    };

    //displayall categories
    getAllData();

    //DeleteCategory
    $('tbody#categories').on('click', 'button#delete', function () {
        var id = $(this).data('id');
        var sendData = {
            id: id,
            _token: token
        };
        alertify.confirm("Confirm Delete", "Are u sure!!", function () {
            $.ajax({
                url: url + '/backend/category/delete',
                method: 'POST',
                data: sendData,
                success: function (data) {
                    if (data.status == true) {
                        swal(
                            "Deleted",
                            data.msg,
                            "success");
                        getAllData();
                    }
                },
                error: function (err) {
                    if (data.status == false) {
                        swal(
                            "Error!!",
                            data.msg,
                            "error");
                    }
                }
            });
            return;
        }, function () {
            swal(
                "Action was Canceled");
        });
    });

});