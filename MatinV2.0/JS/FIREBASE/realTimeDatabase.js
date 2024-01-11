import { db, ref, set, push, onChildAdded, getDatabase, createUserWithEmailAndPassword, auth, signInWithEmailAndPassword, updateProfile } from "../FIREBASE/firebaseConfig.js";

let userID = localStorage.getItem("userId");
let name = localStorage.getItem("name");
let email = localStorage.getItem("email");

if (!userID) {
    email = prompt("Email de usuario");
    const password = prompt("Senha de usuario");

    // ISSO AQUI VAI CRIAR UM NOVO USUARIO

    if (email && password) {
        await login(email, password);
    }
}

const refMessage = ref(db, "messages/");

function sendMessage(event) {
    try {
        event.preventDefault();
        const input_data = document.getElementById('user-msg');
        const db = getDatabase();
        const newMessage = push(refMessage);

        set(newMessage, {
            name: name,
            email: email,
            message: input_data.value,
        });

        input_data.value = "";
    } catch (erro) {
        console.error("ERRO: ", erro);
    }
}

async function login(email, password) {
    try {
        const res = await signInWithEmailAndPassword(auth, email, password);
        localStorage.setItem("userId", res.user.uid);
        email = res.user.email;
        name = res.user.displayName;
        localStorage.setItem("name", name); // Save the name to local storage
    } catch (error) {
        const errorCode = error.code;
        if (errorCode === "auth/invalid-credential") {
            await createUser(email, password);
        } else {
            alert('Houve um erro, tente novamente mais tarde!');
        }
        const errorMessage = error.message;
        console.log(errorCode, errorMessage);
    }
}

async function createUser(email, password) {
    name = prompt("Qual é o seu nome?");
    try {
        const res = await createUserWithEmailAndPassword(auth, email, password);
        email = res.user.email;

        await updateProfile(auth.currentUser, {
            displayName: name,
        });

        localStorage.setItem("userId", res.user.uid);
        localStorage.setItem("name", name);
        
    } catch (error) {
        alert("houve um erro ao criar o mano aí");
    }
}

loadMessage();

function loadMessage() {
    const messageDiv = document.querySelector(".mensagens-encl");

    onChildAdded(refMessage, (snapshot) => {
        const elementDiv = document.createElement("mensagem");
        const elementMessage = document.createElement("p");
        const data = snapshot.val();

        elementMessage.innerText = `Usuario: ${data.name}: ${data.message}`;
        messageDiv.appendChild(elementDiv);
        elementDiv.appendChild(elementMessage);
    })
}

window.sendMessage = sendMessage;
