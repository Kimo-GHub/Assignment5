import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';


$('#search').on('keyup', function() {
    let query = $(this).val();
    $.ajax({
        url: "/search",
        type: "GET",
        data: { 'query': query },
        success: function(data) {
            $('#results').html(data);
        }
    });
});
