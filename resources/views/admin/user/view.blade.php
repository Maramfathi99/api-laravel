@extends('admin.layout.index')
@section('content')
<div class="page-content">
    
     @include('admin.layout.breadcrumb')
     Users
<div class="portlet-body">
<div class="table-scrollable">

     <table class="table table-hover" id="users_tbl">
    <thead>
        <tr>
            <th width="5%">#</th>
            <th>الاسم</th>
            <th>رقم الهاتف</th>
            <th>تاريخ التعيين</th>
            <th>الراتب</th>
            <th>القسم</th>
            <th>المسمى الوظيفي</th>
            <th>البريد الإلكتروني</th>
            <th >العمليات</th>
        </tr>
    </thead>
</table>
</div>
</div>
</div>
@push('js')
     <script>
          $(document).ready(function(){
            $('#users_tbl').dataTable({
'processing':true,
'serverSide':true,
'ajax':"{{url(admin_vw().'/user-data')}}",
columns:[

     {data:'num',name:'num'},
     {data:'fname',name:'fname'},
     {data:'phone',name:'phone'},
     {data:'hire_date',name:'hire_date'},
     {data:'salary',name:'salary'},
     {data:'department_id',name:'department_id'},
     {data:'job_id',name:'job_id'},
     {data:'email',name:'email'},
     {data:'action',name:'action'}

]
            });  
          })
     </script>
@endpush
@endsection