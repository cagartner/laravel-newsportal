@inject('permissions', 'App\Http\Controllers\GroupController')
@if ($permissions->get()->count())
    @foreach ($permissions->get() as $view)
        @if ($view->status == 1 && $view->permission == 12) 
  <table style="direction: rtl;">
  <thead>
    <tr>
      <th colspan="12">تقرير اداء الاعضاء خاص بالاعلانات بتاريخ {{$today}}</th>
    </tr>
    <tr>
  			<th colspan="">#</th>
    		<th colspan="2">اسم العضو</th>
			<th colspan="2">العنوان</th>
			<th colspan="2">تاريخ الانشاء</th>
			<th colspan="2">عدد اخر تحديث</th>
			<th colspan="2">عدد الاخبار الخاصة بالعضو</th>
      <th colspan="2">حالة العنوان</th>
  		</tr>
  </thead>
  <tbody>
    	@if ($advs->count())
			@foreach($advs as $view)
				<tr>
					<td colspan="">{{$view->id}}</td>
					<td colspan="2">
					@if ($users->count())
						@foreach ($users as $user)
							@if ($user->id == $view->user_id)
								{{$user->name}}
							@endif
						@endforeach
					@endif
					</td>
					<td colspan="2">{{$view->title}}</td>
					<td colspan="2">{{$view->created_at}}</td>
					<td colspan="2">{{$view->updated_at}}</td>
					<td colspan="2">
						@foreach ($creates_arr as $arr)
							<a href="/admin/report/advertisements?title=&status=&created_at=&user_id={{$view->user_id}}">{{$arr}}</a>
							<?php break; ?>
						@endforeach
					</td>
          <td colspan="2">
            @if ($today > $view->end)
                <p style="color:#F89A14;">منتهي</p>
            @else
                <p style="color:#01BC8C;">غير منتهي</p>
            @endif
          </td>
				</tr>
			@endforeach
		@endif
  </tbody>
</table>
<style type="text/css">
	* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

table {
  color: #333;
  font-family: sans-serif;
  font-size: .9em;
  font-weight: 300;
  text-align: right;
  line-height: 40px;
  border-spacing: 0;
  border: 2px solid #405877;
  width: 99%;
  margin: 5px;
}

thead tr:first-child {
  background: #405877;
  color: #fff;
  border: none;
}

th {font-weight: bold;}
th:first-child, td:first-child {padding: 0 15px 0 20px;}

thead tr:last-child th {border-bottom: 3px solid #ddd;}

tbody tr:hover {background-color: #ffeeff;}
tbody tr:last-child td {border: none;}
tbody td {border-bottom: 1px solid #ddd;}

td:last-child {
  text-align: right;
  padding-right: 10px;
}

.button {
  color: #696969;
  padding-right: 5px;
  cursor: pointer;
}

.alterar:hover {
  color: #0a79df;
}

.excluir:hover {
  color: #dc2a2a;
}
</style>
              @endif
                        @if ($view->status == 2 && $view->permission == 12)
            @section('content')
                <p style="margin-right: 380px;font-size: large;color: rgb(224, 109, 109);"><i class="fa fa-fw fa-minus-square"></i>غير مسموح لك بالدخول لهذه الصفحة</p>
            @endsection
        @endif
    @endforeach
@endif