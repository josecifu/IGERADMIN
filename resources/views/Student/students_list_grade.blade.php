<table class="table table-bordered table-hover table-checkable" id="kt_datatable" style="margin-top: 13px !important">
    <thead>
        <tr>
            @foreach($Titles as $Title)
            <th>{{ $Title }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($Models as $Model)
        <tr>
            <td>{{$Model['info']}}</td>
        </tr>
        @endforeach
    </tbody>
</table>