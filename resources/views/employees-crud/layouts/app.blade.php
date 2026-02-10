<!DOCTYPE html>
<html lang="en">
@include("employees-crud/includes.header")
<body>
    @yield("content")
    <script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>



<script>
$(document).ready(function () {

    function fetchEmployees(query = '', page = 1) {
        $.ajax({
            url: "{{ route('employee.index') }}",
            type: "GET",
            data: {
                search: query,
                page: page
            },
            success: function (data) {
                $('#employee-table').html(data);
            }
        });
    }

    // Live search
    $('#search').on('keyup', function () {
        let query = $(this).val();
        fetchEmployees(query);
    });

    // Pagination click
    $(document).on('click', '.pagination a', function (e) {
        e.preventDefault();
        let page = $(this).attr('href').split('page=')[1];
        let query = $('#search').val();
        fetchEmployees(query, page);
    });

    // Selected by checkbox
    $("#selectAll").click(function(){
        $(".row-checkbox").prop("checked", $(this).prop("checked"));
    });
    $("#deleteSelected").click(function(e){
        e.preventDefault();
        var all_ids = [];
        $("input:checkbox[name=ids]:checked").each(function(){
            all_ids.push($(this).val());
        });

        $.ajax({
            url:"{{ route("employee.bulkDelete") }}",
            type:"DELETE",
            data:{
                ids:all_ids,
                _token: '{{ csrf_token() }}',
            },
            success:function(response){
                location.reload();
                $.each(all_ids, function(key,val){
                    $("#employee_ids"+val).remove();
                });
            }
        });
    });

});
</script>
</body>
</html>