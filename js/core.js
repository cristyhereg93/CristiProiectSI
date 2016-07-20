$(document).ready(function () {
    var last_msg;
    setInterval(function () {
        $.ajax({
            url: 'getMessage.php',
            datatype: "JSON",
            success: function (data) {
                if (last_msg != data)
                {
                    var json = $.parseJSON(data);
                    $('#chatbox').append("<p><b>" + json['username'] + "</b> :   " + json['message'] + "</p>");
                }

                last_msg = data;
            }
        })
    }, 1000);
    
    var last_file;
    setInterval(function () {
        $.ajax({
            url: 'getFiles.php',
            datatype: "JSON",
            type: 'POST',
            data: {'first_run' : 0},
            success: function (data) {
                if (last_file != data)
                {
                    var json = $.parseJSON(data);
                    var file = json['file'].split('/');
                    $('#uploadedFiles').append("<li><b>" + json['username'] + "</b> :   <a href='download.php?download_file=" + file['1'] + "'>" + file['1'] + "</a></li>");
                    $('#chatbox').append("<p><b>System Message</b> :   User " + json['username'] + " just uploaded a new file !</p>");
                }

                last_file = data;
            }
        })
    }, 1000);

    $('#submit').click(function () {
        var params = {'msg': $("#message").val()};
        $.ajax({
            url: "insertMessage.php",
            type: "POST",
            data: params,
            success: function (data) {
                if (data == 1) {
                    $('#message').val('');
                }
            }
        });
    });

    $(document).keypress(function (e) { //pentru tasta enter
        if (e.which == 13) {
            var params = {'msg': $("#message").val()};
            $.ajax({
                url: "insertMessage.php",
                type: "POST",
                data: params,
                success: function (data) {
                    if (data == 1) {
                        $('#message').val('');
                    }
                }
            });
        }
    });
    
});


