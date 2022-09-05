@component('mail::message')
  <p>Gentile {{ $user->name }},</p>
  <p>siamo felici di informarla che il suo post, dal titolo <strong>{{ $post->title }}</strong> è stato creato
    correttamente.</p>

  <p>Per accedere e vedere il suo post, la invitiamo a cliccare sul link sottostante:</p>

  <img src="{{ Storage::url($post->cover_img) }}" alt="">
  @component('mail::button', ['url' => route('admin.posts.show', $post->slug)])
    Vai al mio post!
  @endcomponent

  Cordialmente,<br>
  Classe #65
@endcomponent
