<main>
    <article class="bg flex relative">

            <section class="form-sect insc-absolute">
                <div class="form-div">
                    <form class="inscription" action="./?action=inscription" method="POST">
                        <fieldset>
                            <legend>Inscription</legend>
                            <div class="grid-container">
                                <div class="flex">
                                    <label for="pseudoU">Nom d'utilisateur</label>
                                    <input type="text" placeholder="Nom d'utilisateur" name="pseudoU" id="pseudoU" required/>
                                </div>
                                <div class="flex">
                                    <label for="mailU">Email</label>
                                    <input type="text" placeholder="Email" name="mailU" id="mailU" required/>
                                </div>
                                <div class="flex">
                                    <label for="mdpU">Mot de passe</label>
                                    <input type="password" placeholder="Mot de passe" name="mdpU" id="mdpU" required/>
                                </div>
                            </div>
                            <button id="bouton" class="log inscri" type="submit">S'inscrire</button>
                            <div class="session" id="alert" role="alert"></div>
                        </fieldset>
                    </form>
                </div>
            </section>

    </article>

</main>