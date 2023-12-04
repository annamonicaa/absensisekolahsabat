@extends('layouts.app')

@section('content')
<br>
<div id="total_records"></div>
<hr>
<br>
<input type="text" name="search" id="search">
<table>
    <thead>
        <tr>
            <th>haha</th>
        </tr>
    </thead>
    <tbody></tbody>
</table>


<script>
    $(document).ready(function(){
        fetch_member();

        function fetch_member(query = '') {
            $.ajax({
                url:"{{ route('action') }}",
                method:'GET',
                data:{query:query},
                dataType:'json',
                success:function(data)
                {
                    $('tbody').html(data.table_data);
                    
                }
            })
        }

        $(document).on('keyup', '#search', function() {
            var query = $(this).val();
            fetch_member(query);
        });
    });
</script>

@endsection