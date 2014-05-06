@extends('layouts.journal_entries')

@section('content')
	
	<!-- page contents ------------------------------------------------------------------------------------------------------>	

	<div class="toolframe" style ="background-color:#F9F9F9">
		<!-- @foreach ($entries as $row)
			{{{  Crypt::decrypt($row->subject)  }}}
			{{{  Crypt::decrypt($row->body)  }}}
			<br />
		@endforeach -->

		@foreach ($entries as $row)
		<br />
		<div style ="background-color:white; padding: 15px; border-radius:3px">
			<span id="journal_subject">{{{  Crypt::decrypt($row->subject)  }}}</span>
			<br />
			<span id="journal_date"> {{{  date('F jS Y', strtotime($row->created_at)) }}} </span>
			<br />
			<br />
			<span id="journal_body">{{{  Crypt::decrypt($row->body)  }}}</span>
		</div>
		@endforeach

	</div>

@stop
