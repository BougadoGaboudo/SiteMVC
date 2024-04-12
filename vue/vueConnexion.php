<main class="bg">

<article class="form-height">

            <section class="form-sect">
                <div class="form-div">
                    <form action="./?action=connexion" method="POST">
                        <fieldset>
                            <legend>Connexion</legend>
                            <div class="flex">
                                <label for="mailU">Email</label>
                                <input type="text" placeholder="Email" name="mailU" id="mailU" required/>
                            </div>
                            <div class="flex">
                                <label for="mdpU">Mot de passe</label>
                                <input type="password" placeholder="Mot de passe" name="mdpU" id="mdpU" required/>
                            </div>
                            <button id="bouton" class="log" type="submit">Se connecter</button>
                            <div class="session" id="alert" role="alert"></div>
                            <a class="create" href="./?action=inscription">Créer un compte</a>
                        </fieldset>
                    </form>
                </div>
            </section>

</article>

</main>