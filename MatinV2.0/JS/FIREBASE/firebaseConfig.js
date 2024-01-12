import { initializeApp } from "https://www.gstatic.com/firebasejs/10.7.1/firebase-app.js";
import { getAnalytics } from "https://www.gstatic.com/firebasejs/10.7.1/firebase-analytics.js";
import { getDatabase, ref, set, push, onChildAdded } from "https://www.gstatic.com/firebasejs/10.7.1/firebase-database.js";
import {getAuth, createUserWithEmailAndPassword, signInWithEmailAndPassword, updateProfile, signOut} from "https://www.gstatic.com/firebasejs/10.7.1/firebase-auth.js";

const firebaseConfig = {
    apiKey: "AIzaSyDSfDUDl3HABCREotqbNMzn6pBXENPDlj4",
    authDomain: "mat-in.firebaseapp.com",
    projectId: "mat-in",
    storageBucket: "mat-in.appspot.com",
    messagingSenderId: "992180471337",
    appId: "1:992180471337:web:6d93870c8e9b736ea23e38",
    measurementId: "G-BKB23CQQKN"
};

const app = initializeApp(firebaseConfig);
const analytics = getAnalytics(app);
const db = getDatabase(app);
const auth = getAuth(app);

export { db, ref, set, push, onChildAdded, getDatabase, createUserWithEmailAndPassword, getAuth, signInWithEmailAndPassword, auth, updateProfile, signOut};