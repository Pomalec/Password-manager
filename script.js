
document.addEventListener("DOMContentLoaded", function() {
    const addPasswordBtn = document.getElementById("add-password-btn");
    const addPasswordPopup = document.getElementById("add-password-popup");
    const changeAccountBtn = document.getElementById("change-account-btn");
    const changeAccountPopup = document.getElementById("change-account-popup");
    const closeBtns = document.querySelectorAll(".close");

    addPasswordBtn.addEventListener("click", function() {
        addPasswordPopup.style.display = "block";
    });

    changeAccountBtn.addEventListener("click", function() {
        changeAccountPopup.style.display = "block";
    });

    closeBtns.forEach(function(closeBtn) {
        closeBtn.addEventListener("click", function() {
            addPasswordPopup.style.display = "none";
            changeAccountPopup.style.display = "none";
        });
    });

    window.addEventListener("click", function(event) {
        if (event.target === addPasswordPopup) {
            addPasswordPopup.style.display = "none";
        }
        if (event.target === changeAccountPopup) {
            changeAccountPopup.style.display = "none";
        }
    });

    const addPasswordForm = document.getElementById("add-pass");
    addPasswordForm.addEventListener("click", function(event) {
        
        let username = document.getElementById("username").value;
        let password = document.getElementById("password").value;
        let website = document.getElementById("website").value;
        // Here you can do something with the form data, like sending it to a server
        console.log("Username:", username);
        console.log("Password:", password);
        console.log("Website:", website);

       /*  // script to hash the passwords
        const { createHmac } = require('node:crypto');

        const secret = 'jkdlsa90sd8sklad';
        const hash = createHmac('sha256', secret)
                    .update(passwrod)
                    .digest('hex');
        console.log(hash);

        password = hash; */
        // Clear the form inputs
        
    });
    function sentdata() {
        let username = document.getElementById("username").value;
        let password = document.getElementById("password").value;
        let website = document.getElementById("website").value;
        // Here you can do something with the form data, like sending it to a server
        console.log("Username:", username);
        console.log("Password:", password);
        console.log("Website:", website);

    }

    const changeAccountForm = document.getElementById("change-account-form");
    changeAccountForm.addEventListener("submit", function(event) {
        event.preventDefault();
        const newUsername = document.getElementById("new-username").value;
        const newPassword = document.getElementById("new-password").value;
        // Here you can do something with the form data, like sending it to a server
        console.log("New Username:", newUsername);
        console.log("New Password:", newPassword);
        // Clear the form inputs
        changeAccountForm.reset();
        // Close the popup
        changeAccountPopup.style.display = "none";
    });
});
document.addEventListener("DOMContentLoaded", function() {
    const addPasswordBtn = document.getElementById("add-password-btn");
    const addPasswordPopup = document.getElementById("add-password-popup");
    const changeAccountBtn = document.getElementById("change-account-btn");
    const changeAccountPopup = document.getElementById("change-account-popup");
    const deleteAccountBtn = document.getElementById("delete-account-btn");
    const deleteAccountPopup = document.getElementById("delete-account-popup");
    const closeBtns = document.querySelectorAll(".close");

    addPasswordBtn.addEventListener("click", function() {
        addPasswordPopup.style.display = "block";
    });

    changeAccountBtn.addEventListener("click", function() {
        changeAccountPopup.style.display = "block";
    });

    deleteAccountBtn.addEventListener("click", function() {
        deleteAccountPopup.style.display = "block";
    });

    closeBtns.forEach(function(closeBtn) {
        closeBtn.addEventListener("click", function() {
            addPasswordPopup.style.display = "none";
            changeAccountPopup.style.display = "none";
            deleteAccountPopup.style.display = "none";
        });
    });

    window.addEventListener("click", function(event) {
        if (event.target === addPasswordPopup) {
            addPasswordPopup.style.display = "none";
        }
        if (event.target === changeAccountPopup) {
            changeAccountPopup.style.display = "none";
        }
        if (event.target === deleteAccountPopup) {
            deleteAccountPopup.style.display = "none";
        }
    });


 

   /*  const addPasswordForm = document.getElementById("add-password-form");
    addPasswordForm.addEventListener("submit", function(event) {
        event.preventDefault();
        const username = document.getElementById("username").value;
        let password = document.getElementById("password").value;
        const website = document.getElementById("website").value;
        // Here you can do something with the form data, like sending it to a server
        console.log("Username:", username);
        console.log("Password:", password);
        console.log("Website:", website);



        // encrypts pass for new data
        const data = password; //something to encrypt

        const {publicKey,privateKey} = crypto.generateKeyPairSync("rsa",{
            modulusLength: 2048, //for secure hashing length of a hashfunction
        })

        // encryption function
        //using sha256 but you can use any sha524 or others
        const encryptMe = crypto.publicEncrypt({
            key: publicKey,
            padding: crypto.constants.RSA_PKCS1_OAEP_PADDING,
            oaepHash: "sha256"
        }, Buffer.from(data));  //remember palin text first should be converted to binary form

        console.log("Hash: ",encryptMe.toString("base64"));

        // now lets decrypt

        const decryptData =  crypto.privateDecrypt({
            key: privateKey,
            padding: crypto.constants.RSA_PKCS1_OAEP_PADDING,
            oaepHash: "sha256"
        },encryptMe);

        console.log("\nDecrypted data: ", decryptData.toString())
        
        // Clear the form inputs
        addPasswordForm.reset();
        // Close the popup
        addPasswordPopup.style.display = "none";
    }); */


    const changeAccountForm = document.getElementById("change-account-form");
    changeAccountForm.addEventListener("submit", function(event) {
        event.preventDefault();
        const newUsername = document.getElementById("new-username").value;
        const newPassword = document.getElementById("new-password").value;
        // Here you can do something with the form data, like sending it to a server
        console.log("New Username:", newUsername);
        console.log("New Password:", newPassword);
        // Clear the form inputs
        changeAccountForm.reset();
        // Close the popup
        changeAccountPopup.style.display = "none";
    });

    const deleteAccountForm = document.getElementById("delete-account-form");
    const confirmDeleteBtn = document.getElementById("confirm-delete");
    confirmDeleteBtn.addEventListener("click", function() {
        // Here you can implement the logic to delete the account
        console.log("Account deleted.");
        // Close the popup
        deleteAccountPopup.style.display = "none";
    });
});
