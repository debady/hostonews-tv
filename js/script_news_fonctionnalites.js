// <!--  script JavaScript de recuperation des informations du commenatire-->

document.addEventListener('DOMContentLoaded', function () {
document.getElementById('comment-form').addEventListener('submit', function (event) {
event.preventDefault();

// Récupérer les données
const commentaireTexte = document.getElementById('comment-input').value;
const nomPrenomTexte = document.getElementById('nom_prenom').value;
const photoTexte = document.getElementById('photo').value;
const utilisateurIdTexte = document.getElementById('utilisateur_id').value;

// Validation des champs
if (!commentaireTexte || !nomPrenomTexte || !photoTexte || !utilisateurIdTexte) {
    alert("Pardon ! Veuillez vous connecté d'abord .");
    return;
}

// Envoyer les données
fetch('live_chat/api/save_comment.php', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
    },
    body: JSON.stringify({
        nom_prenom: nomPrenomTexte,
        photo: photoTexte,
        utilisateur_id: utilisateurIdTexte,
        commentaire: commentaireTexte,
    }),
})
    .then((response) => response.json())
    .then((data) => {
        if (data.success) {
            // Vider les champs après envoi
            document.getElementById('comment-input').value = '';

            // Recharger les commentaires
            loadComments();
        } else {
            console.error('Erreur lors de l\'envoi du commentaire', data.error);
        }
    })
    .catch((error) => {
        console.error('Erreur lors de l\'envoi du commentaire', error);
    });
});


// script pour charger les nouveaux commentaires
function loadComments() {
    fetch('live_chat/api/get_comments.php')
        .then((response) => response.json())
        .then((data) => {
            const commentsSection = document.getElementById('comments-section');
            commentsSection.innerHTML = ''; // Vider les commentaires existants

            if (data.length === 0) {
                // Aucun commentaire
                commentsSection.innerHTML = '<div class="no-comments">Aucun commentaire pour l\'instant.</div>';
            } else {
                // Ajouter les commentaires
                data.forEach((comment) => {
                    const commentElement = document.createElement('div');
                    commentElement.classList.add('comment-item');

                    // Créer une image pour la photo de profil
                    const profileImage = document.createElement('img');
                    profileImage.src = `images/Peoples/${comment.photo}`; 
                    profileImage.alt = `${comment.nom_prenom}`;
                    profileImage.classList.add('profile-image');

                    // Ajouter le texte du commentaire
                    const commentText = document.createElement('div');
                    commentText.textContent = `${comment.nom_prenom} ${comment.commentaire}`;
                    commentText.classList.add('comment-text');

                    // Ajouter l'image et le texte dans l'élément de commentaire
                    commentElement.appendChild(profileImage);
                    commentElement.appendChild(commentText);

                    // Ajouter le commentaire à la section
                    commentsSection.appendChild(commentElement);
                });
            }

            // S'assurer que le dernier commentaire est visible en bas
            commentsSection.scrollTop = commentsSection.scrollHeight;
        })
        .catch((error) => {
            console.error('Erreur lors du chargement des commentaires', error);
        });
}

// une sorte d'actualisation à chaque 3s pour afficher les news commentaires
setInterval(() => {
    loadComments();
}, 3000);
loadComments();

});

//----------------js des reactions -------------------

document.addEventListener('DOMContentLoaded', () => {
const emojiButtons = document.querySelectorAll('.emoji-btn');
const emojiAnimation = document.getElementById('emoji-animation');

// Fonction pour créer une animation d'emoji
function createEmojiAnimation(emoji) {
    const emojiElement = document.createElement('div');
    emojiElement.textContent = emoji;
    emojiElement.style.position = 'absolute';
    emojiElement.style.fontSize = '2rem';
    emojiElement.style.zIndex = '1000';

    // Positionner l'emoji à un endroit aléatoire dans la vidéo
    const animationArea = emojiAnimation.getBoundingClientRect();
    const x = Math.random() * animationArea.width;
    const y = Math.random() * animationArea.height;

    emojiElement.style.left = `${x}px`;
    emojiElement.style.top = `${y}px`;

    emojiAnimation.appendChild(emojiElement);

    // Animation de montée et disparition
    emojiElement.animate(
        [
            { transform: 'translateY(0)', opacity: 1 },
            { transform: 'translateY(-100px)', opacity: 0 },
        ],
        {
            duration: 1500,
            easing: 'ease-out',
        }
    );

    // Supprimer l'emoji après l'animation
    setTimeout(() => {
        emojiElement.remove();
    }, 1500);
}

// Ajoutez un écouteur à chaque bouton
emojiButtons.forEach((button) => {
    button.addEventListener('click', () => {
        const emoji = button.dataset.emoji;
        createEmojiAnimation(emoji);
    });
});
});

// --------------- script de selection et d'affichage du drapeau ------------

function setCookie(name, value, days) {
    var d = new Date();
    d.setTime(d.getTime() + (days * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = name + "=" + value + ";" + expires + ";path=/";
}

// Fonction pour récupérer un cookie par son nom
function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
}

// Fonction pour changer le pays
function changeFlag() {
    var select = document.getElementById("country-select");
    var selectedOption = select.options[select.selectedIndex];

    // Récupérer l'attribut data-flag pour l'image du drapeau
    var flagSrc = selectedOption.getAttribute("data-flag");
    var countryCode = selectedOption.value.toUpperCase();

    // Modifier l'image du drapeau et le code du pays
    document.getElementById("country-flag").src = flagSrc;
    document.getElementById("country-code").textContent = countryCode;

    // Enregistrer le pays sélectionné dans un cookie
    setCookie("selectedCountry", countryCode, 30);
}

// Lors du chargement de la page, vérifier si un pays a été sélectionné précédemment
window.onload = function() {
    var selectedCountry = getCookie("selectedCountry");

    if (selectedCountry) {
        var select = document.getElementById("country-select");
        var options = select.options;

        // Trouver l'option correspondant au pays sauvegardé
        for (var i = 0; i < options.length; i++) {
            if (options[i].value.toUpperCase() === selectedCountry) {
                select.selectedIndex = i;
                changeFlag();
                break;
            }
        }
    } else {
        // Si aucun pays n'est sélectionné, mettre le pays par défaut (Côte d'Ivoire)
        select.selectedIndex = 0;
        changeFlag();
    }
};



//-------------------- previsualisation du changement de l'images ------------

function previewNewImage(event) {
    const image = document.getElementById('preview-image');
    const file = event.target.files[0];

    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            image.src = e.target.result; 
        };
        reader.readAsDataURL(file); 
    }
}


// ------------- script de condition du mdp--------------

const passwordInput = document.getElementById('password');
const lengthRequirement = document.getElementById('length');
const uppercaseRequirement = document.getElementById('uppercase');
const numberRequirement = document.getElementById('number');
const specialRequirement = document.getElementById('special');

passwordInput.addEventListener('input', () => {
    const password = passwordInput.value;

    // Check each requirement
    if (password.length >= 8) {
        lengthRequirement.classList.add('valid');
    } else {
        lengthRequirement.classList.remove('valid');
    }

    if (/[A-Z]/.test(password)) {
        uppercaseRequirement.classList.add('valid');
    } else {
        uppercaseRequirement.classList.remove('valid');
    }

    if (/\d/.test(password)) {
        numberRequirement.classList.add('valid');
    } else {
        numberRequirement.classList.remove('valid');
    }

    if (/[\W_]/.test(password)) {
        specialRequirement.classList.add('valid');
    } else {
        specialRequirement.classList.remove('valid');
    }
});


// --------------------Script pour garder les données dans les champs a revoir--------------

const form = document.getElementById('registrationForm');

// Charger les données depuis SessionStorage
window.addEventListener('load', () => {
    const savedData = JSON.parse(sessionStorage.getItem('formData'));
    if (savedData) {
        document.getElementById('email').value = savedData.email || '';
        document.getElementById('password').value = savedData.password || '';
        document.getElementById('confirm_password').value = savedData.confirm_password || '';
    }
});

// Sauvegarder les données lors de la soumission
form.addEventListener('submit', (event) => {
    const formData = {
        email: document.getElementById('email').value,
        password: document.getElementById('password').value,
        confirm_password: document.getElementById('confirm_password').value
    };
    sessionStorage.setItem('formData', JSON.stringify(formData));
    
});

// Nettoyer SessionStorage après succès (AJAX ou redirection à traiter côté serveur)
// Exemple : si une erreur survient côté serveur, SessionStorage n'est pas nettoyé.
// Ajouter ce nettoyage au bon moment.
// sessionStorage.removeItem('formData');


//  ------------------------- script de demande de suppression de compte-------------------

// demande de suppression Bateau
function confirmSuppression_Bateau(id) {
    Swal.fire({
        title: 'Êtes-vous sûr de vouloir supprimer ce bien ?',
        text: "Cette action est irréversible!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Oui, supprimer !',
        cancelButtonText: 'Annuler'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "traitement/trait_supprime.php?id=" + id;
        }
    })
    }



// ----------le script de recherche de date affichage du fichier programme----------

document.getElementById('start-date').addEventListener('click', function() {
    this.showPicker();
});

document.getElementById('end-date').addEventListener('click', function() {
    this.showPicker();
});

document.getElementById('date-search-form').addEventListener('submit', function(event) {
    event.preventDefault(); // Empêche le rechargement de la page

    const startDate = document.getElementById('start-date').value;
    const endDate = document.getElementById('end-date').value;

    if (new Date(startDate) > new Date(endDate)) {
        alert('La date de début doit être antérieure ou égale à la date de fin.');
    } else {
        alert(`Recherche effectuée du ${startDate} au ${endDate}.`);
    }
});



//  ---------script pour voir les commentaires et commenté dans le fichiers replays-----
function toggleComments(button) {
    const commentsSection = button.nextElementSibling;
    commentsSection.classList.toggle('d-none');
    button.textContent = commentsSection.classList.contains('d-none')
        ? 'Voir les commentaires'
        : 'Cacher les commentaires';
}


function handleReaction(event) {
    const button = event.currentTarget;
    const countSpan = button.querySelector('.reaction-count');
    let count = parseInt(countSpan.textContent, 10);
    const replayId = button.getAttribute('data-id');

    // Si déjà réagi, on retire la réaction, sinon on l'ajoute
    if (button.classList.contains('reacted')) {
        button.classList.remove('reacted');
        count -= 1;
    } else {
        button.classList.add('reacted');
        count += 1;
    }

    countSpan.textContent = count;

    // Envoi de la mise à jour à la base de données via AJAX
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "../trait_infos/update_reaction.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    // Lors de la réponse, on met à jour l'affichage si nécessaire
    xhr.onload = function () {
        if (xhr.status === 200) {
            console.log('Réaction mise à jour en base :', count);
        } else {
            console.log('Erreur lors de la mise à jour de la réaction');
        }
    };

    // Envoi de l'ID du replay et du nombre de réactions
    xhr.send("id=" + replayId + "&reaction_count=" + count);
}

