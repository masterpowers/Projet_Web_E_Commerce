<h1>Bonjour {{$username}}</h1>
<p>Merci de votre inscription!</p>
<p>Veuillez valider votre compte avec le lien suivant : <a href={{ URL::to('register/verify/' . $confirmation_code) }}>Cliquez sur ce lien pour confimer ton inscription!</a></p>