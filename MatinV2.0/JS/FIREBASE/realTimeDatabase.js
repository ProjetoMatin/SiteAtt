import { db, ref, set, push, onChildAdded, getDatabase, createUserWithEmailAndPassword, auth, signInWithEmailAndPassword, updateProfile, signOut } from "../FIREBASE/firebaseConfig.js";

let userID = localStorage.getItem("userId");
let name = localStorage.getItem("name");
let email = localStorage.getItem("email");
let currentID;
const refUser = ref(db, "user/");

if (!userID) {
    email = prompt("Email de usuario");
    const password = prompt("Senha de usuario");

    // ISSO AQUI VAI CRIAR UM NOVO USUARIO

    if (email && password) {
        await login(email, password);
        updateDropdownUserName();
        // console.log(userID);
    }
}

if(userID){

    if (localStorage.getItem("email") === "atendimentoMatin@gmail.com" || localStorage.getItem("email") === "atendimentomatin@gmail.com") {
        localStorage.setItem("name", "AtendimentoMatin");
        loadListClients();
        updateDropdownUserName();
    }else{
        setUser(name, email);
        updateDropdownUserName();
        loadMessage(localStorage.getItem("userId"));
    }
}

function sendMessage(event) {
    try {
        event.preventDefault();
        const input_data = document.getElementById('user-msg');
        const db = getDatabase();
        const id = currentID ? currentID : userID;
        const refMessage = ref(db, "messages/" + id);
        const newMessage = push(refMessage);
        //SETANDO O NAME PARA O ATENDIMENTO

        set(newMessage, {
            name: currentID ? "atendimentoMatin" : name,
            email: email,
            message: input_data.value,
        });

        input_data.value = "";
    } catch (erro) {
        console.error("ERRO: ", erro);
    }
}

//POR FAVOR TEM UMA GAMBIARRA MUITO GRANDE AQUI, NÃO MEXE NO LOGIN



//SERIO

async function login(email, password) {
    try {
        const res = await signInWithEmailAndPassword(auth, email, password);
        email = res.user.email;
        name = res.user.displayName;

        localStorage.setItem("userId", res.user.uid);
        localStorage.setItem("email", email);
        localStorage.setItem("name", name);
        
        console.log('logado');
        
        if (email === "atendimentomatin@gmail.com") {
            localStorage.setItem("name", "AtendimentoMatin");
            loadListClients();
        }else{
            console.log('logado2');
            const idUsuario = localStorage.getItem("userId");
            loadMessage(idUsuario);
            setUser(name, email);
            updateDropdownUserName();
            location.reload();
        }

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

function loadListClients() {
    const cardContainer = document.getElementById("card-container");

    onChildAdded(refUser, (snapshot) => {
        const data = snapshot.val();

        const card = document.createElement("div");
        card.classList.add("card");

        const cardBody = document.createElement("div");
        cardBody.classList.add("card-body");

        const topCard = document.createElement("div");
        topCard.classList.add("top-card");

        const groupTBT = document.createElement("div");
        groupTBT.classList.add("groupTBT");

        const img = document.createElement("img");
        img.src = "../IMAGES/login-icon.png";
        img.alt = "";

        const cardTitle = document.createElement("h5");
        cardTitle.classList.add("card-title");
        cardTitle.textContent = data.name;

        groupTBT.appendChild(img);
        groupTBT.appendChild(cardTitle);

        const cardText = document.createElement("p");
        cardText.classList.add("card-text");
        cardText.textContent = "2 Dias Atrás";

        topCard.appendChild(groupTBT);
        topCard.appendChild(cardText);

        const verificado = document.createElement("div");
        verificado.classList.add("verificado");

        const cardSubtitle = document.createElement("h6");
        cardSubtitle.classList.add("card-subtitle", "mb-2", "text-body-secondary");
        cardSubtitle.textContent = "Vendedor verificado";

        const premiumImg = document.createElement("img");
        premiumImg.src = "../IMAGES/premium.png";
        premiumImg.alt = "";
        premiumImg.classList.add("premium");

        verificado.appendChild(cardSubtitle);
        verificado.appendChild(premiumImg);

        const cardSubtext = document.createElement("p");
        cardSubtext.classList.add("card-subtext");
        cardSubtext.textContent = "Minha descrição legal!"
        cardBody.appendChild(topCard);
        cardBody.appendChild(verificado);
        cardBody.appendChild(cardSubtext);

        card.addEventListener("click", () =>{
            currentID = snapshot.val().uid;
            setUser(snapshot.val().name, snapshot.val().email);
            loadMessage(snapshot.val().uid);
        })

        card.appendChild(cardBody);
        cardContainer.appendChild(card);
    });
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
        localStorage.setItem("email", email);

        const newMessage = push(refUser);

        loadListClients(res.user.uid);
        setUser(name, email);

        set(newMessage, {
            name: name,
            email: email,
            uid: res.user.uid,
        });

        location.reload();

    } catch (error) {
        console.log(error);
        alert("houve um erro ao criar a conta!");
    }
}

function getCurrentTime(){
    const date = new Date();
    let hours = date.getHours();
    let minutes = date.getMinutes();

    //Adiciona um zero a esqueda se as horas ou minutos forem de um digito.

    hours = hours < 10 ? "0" + hours : hours;
    minutes = minutes < 10 ? "0" + minutes : minutes;

    return `${hours}:${minutes}`;
}

function setUser(name, email){
    try {
        const chatTop = document.getElementById("chat-top");
        chatTop.innerHTML = "";
    
        const imgChat = document.createElement("img");
        imgChat.src = "../IMAGES/pessoaChat.jpg";
        imgChat.alt = "";
        imgChat.id = "imgChat";
    
        const txt_info = document.createElement("div");
        txt_info.classList.add("txt-info");
    
        const userHeaderChat = document.createElement("h1");
        userHeaderChat.id = "userHeaderChat";
    
        const userTimeChat = document.createElement("h3");
        userTimeChat.id = "userTimeChat";
    
        userHeaderChat.innerHTML = name;
        userTimeChat.innerHTML = email;
    
    
        chatTop.appendChild(imgChat);
        chatTop.appendChild(txt_info);
        txt_info.appendChild(userHeaderChat);
        txt_info.appendChild(userTimeChat);
        
    } catch (error) {
        console.error(error);        
    }

}

function loadMessage(uid) {
    const messageDiv = document.querySelector(".mensagens-encl");
    messageDiv.innerText = "";
    const refMessageLoad = ref(db, "messages/" + uid);

    onChildAdded(refMessageLoad, (snapshot) => {
        const elementDiv = document.createElement("div");
        const elementMessage = document.createElement("p");
        const elementMessageSpan = document.createElement("span");
        const data = snapshot.val();

        if(data.email === email){
            elementDiv.classList.add("mensagem", "branco");
        }else{
            elementDiv.classList.add("mensagem", "laranja");
        }

        elementMessageSpan.innerText = `${data.message}`;
        messageDiv.appendChild(elementDiv);
        messageDiv.scrollTop = elementDiv.scrollHeight;
        elementDiv.appendChild(elementMessage);
        elementMessage.appendChild(elementMessageSpan);
    })
}

document.getElementById("logoutButton").addEventListener("click", logout);

async function logout() {
    try {
        await signOut(auth);
        localStorage.removeItem("userId");
        localStorage.removeItem("name");
        localStorage.removeItem("email");
        location.reload();
    } catch (error) {
        console.log(error);
    }
}

function updateDropdownUserName() {
    const nomeUsuarioDropdown = document.getElementById("nomeUsuario");
    const nomeUsuarioLocalStorage = localStorage.getItem("name");

    if (nomeUsuarioLocalStorage) {
        nomeUsuarioDropdown.innerText = nomeUsuarioLocalStorage;
    }
}

window.sendMessage = sendMessage;
window.logout = logout;