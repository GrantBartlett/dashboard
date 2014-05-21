<h1>Members</h1>

<?php
echo "<pre>";
print_r($members);
echo "</pre>";
?>

@foreach ($members as $member)
    <p>This is user {{ $member->email }} - {{ $member->m_field_id_3 }} - ({{ $member->group_title }})</p>
@endforeach
