<html>
<p>Gentile {{ $user->name }},</p>
<p>siamo felici di informarla che il suo post, dal titolo <strong>{{ $post->title }}</strong> è stato creato
  correttamente.</p>

<p>Per accedere e vedere il suo post, la invitiamo a cliccare sul link sottostante:</p>

<div><a href="{{ route('admin.posts.show', $post->slug) }}">Vai al mio post!</a></div>

<p>Cordialmente,<br>
  Classe #65
</p>

</html>
