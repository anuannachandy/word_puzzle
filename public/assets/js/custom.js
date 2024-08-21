$(document).ready(function () {
    const urlParams = new URLSearchParams(window.location.search);
    const scrollTo = urlParams.get('scrollTo');
    if (scrollTo === "leaderboard") {
        const $table = $("#tbl_leaderboard");
        if ($table.length) {
            $table[0].scrollIntoView({ behavior: "smooth" });
        }
    }
});


$('#submitWordForm').on('click', function (e) {
    e.stopImmediatePropagation();
    var form = $('#wordForm')[0];
    var formData = new FormData(form);
    $.ajax({
        url: '/submit',
        method: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            if (response.success) {
                Swal.fire({
                    title: "Congrats",
                    text: "You have won " + response.score + " points",
                    confirmButtonText: "Ok",
                    icon: "success"
                }).then((result) => {
                    if (result.isConfirmed) {
                        setTimeout(function () {
                            window.location.reload();
                        }, 1000);
                    }
                });
            } else {
                $('#result').html('<div class="alert alert-danger"><p>' + response.message + '</p></div>');
                $('#InputStudentId').val('');
                $('#Inputword').val('');
            }
        },
        error: function () {
            $('#result').html('<p>An error occurred.</p>');
        }
    });
});
$('#end_puzzle_btn').on('click', function (e) {
    Swal.fire({
        title: "Wind up the puzzle",
        text: "Are you sure ?",
        showCancelButton: true,
        confirmButtonText: "Yes",
        cancelButtonText: "No",
        icon: "info"
    }).then((result) => {
        if (result.isConfirmed) {
            const parameterValue = "leaderboard";
            window.location.href = `/?scrollTo=${encodeURIComponent(parameterValue)}`;
        }
    });
});
