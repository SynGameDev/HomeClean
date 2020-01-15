$(document).ready(function() {

    $("#query").change(function() {
        var status = $("#query").val();
        switch(status)
        {
            case "review":
                $("#data").attr('placeholder', 'Leave a review...');
                break;
            case "quote":
                $("#data").attr('placeholder', 'Leave your quote details...');
                break;
            case "general":
                $("#data").attr('placeholder', 'How can we help today...');
                break;
            case "cleaning":
                $("#data").attr('placeholder', 'Ask the master...');
                break;
            default:
                break;
        }
    });
});
