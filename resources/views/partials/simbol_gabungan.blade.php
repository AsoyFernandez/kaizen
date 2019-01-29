@if ($log->pengaduans->first()->keamanan == 1)
    <span class="glyphicon glyphicon-fire"></span>
@endif
@if ($log->pengaduans->first()->kerugian == 1)
    <span class="glyphicon glyphicon-warning-sign"></span>
@endif