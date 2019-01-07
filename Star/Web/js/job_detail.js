/* ----------------------------
    CustomValidation prototype
    - Keeps track of the list of invalidity messages for this input
    - Keeps track of what validity checks need to be performed for this input
    - Performs the validity checks and sends feedback to the front end
---------------------------- */

function CustomValidation(input) {
    this.invalidities = [];
    this.validityChecks = [];

    //add reference to the input node
    this.inputNode = input;

    //trigger method to attach the listener
    this.registerListener();
}

CustomValidation.prototype = {
    addInvalidity: function(message) {
        this.invalidities.push(message);
    },
    getInvalidities: function() {
        return this.invalidities.join('. \n');
    },
    checkValidity: function(input) {
        for ( var i = 0; i < this.validityChecks.length; i++ ) {

            var isInvalid = this.validityChecks[i].isInvalid(input);
            if (isInvalid) {
                this.addInvalidity(this.validityChecks[i].invalidityMessage);
            }

            var requirementElement = this.validityChecks[i].element;

            if (requirementElement) {
                if (isInvalid) {
                    requirementElement.classList.add('invalid');
                    requirementElement.classList.remove('valid');
                } else {
                    requirementElement.classList.remove('invalid');
                    requirementElement.classList.add('valid');
                }

            } // end if requirementElement
        } // end for
    },
    checkInput: function() { // checkInput now encapsulated

        this.inputNode.CustomValidation.invalidities = [];
        this.checkValidity(this.inputNode);

        if ( this.inputNode.CustomValidation.invalidities.length === 0 && this.inputNode.value !== '' ) {
            this.inputNode.setCustomValidity('');
        } else {
            var message = this.inputNode.CustomValidation.getInvalidities();
            this.inputNode.setCustomValidity(message);
        }
    },
    registerListener: function() { //register the listener here

        var CustomValidation = this;

        this.inputNode.addEventListener('keyup', function() {
            CustomValidation.checkInput();
        });


    }

};


var PriceValidityChecks = [
    {
        isInvalid: function(input) {
            return input.value < 0;
        },
        invalidityMessage: 'กรุณากรองค่ามากกว่า 0',
        element: document.querySelector('label[for="M_username"] .input-requirements li:nth-child(1)')
    },
    {
        isInvalid: function(input) {
            var illegalCharacters = input.value.match(/[^0-9]/g);
            return illegalCharacters ? true : false;
        },
        invalidityMessage: 'กรุณากรองตัวเลข',
        element: document.querySelector('label[for="M_username"] .input-requirements li:nth-child(2)')
    }
];



/* ----------------------------
    Setup CustomValidation
    Setup the CustomValidation prototype for each input
    Also sets which array of validity checks to use for that input
---------------------------- */
// เช้คภาษาอังกฤษตัวเลขก้อได้ เเละมากกว่า 3 
var PriceInput = document.getElementById('The_propose_price');
// เช้คภาษาอังกฤษเเละไทยเเละมากกว่า 3
// var M_firstnameInput = document.getElementById('C_firstname');
// // เช้คภาษาอังกฤษเเละไทยเเละมากกว่า 3
// var M_lastnameInput = document.getElementById('C_lastname');
// // เช้คภาษาอังกฤษตัวเลขก้อได้ เเละมากกว่า 8
// var M_passwordInput = document.getElementById('C_password');
// var M_passwordRepeatInput = document.getElementById('C_password_repeat');
// //เช็คภาษาอังกฤษเเละอักขระ

// var M_phoneInput = document.getElementById('C_phone');

PriceInput.CustomValidation = new CustomValidation(PriceInput);
PriceInput.CustomValidation.validityChecks = PriceValidityChecks;

// M_firstnameInput.CustomValidation = new CustomValidation(M_firstnameInput);
// M_firstnameInput.CustomValidation.validityChecks = M_firstnameValidityChecks;

// M_lastnameInput.CustomValidation = new CustomValidation(M_lastnameInput);
// M_lastnameInput.CustomValidation.validityChecks = M_lastnameValidityChecks;

// M_passwordInput.CustomValidation = new CustomValidation(M_passwordInput);
// M_passwordInput.CustomValidation.validityChecks = M_passwordValidityChecks;

// M_passwordRepeatInput.CustomValidation = new CustomValidation(M_passwordRepeatInput);
// M_passwordRepeatInput.CustomValidation.validityChecks = M_passwordRepeatValidityChecks;

// M_phoneInput.CustomValidation = new CustomValidation(M_phoneInput);
// M_phoneInput.CustomValidation.validityChecks = M_phoneValidityChecks;


/* ----------------------------
    Event Listeners
---------------------------- */

var inputs = document.querySelectorAll('input:not([type="submit"])');
var submit = document.querySelector('input[type="submit"');
var form = document.getElementById('registration');

function validate() {
    for (var i = 0; i < inputs.length; i++) {
        inputs[i].CustomValidation.checkInput();
    }
}

submit.addEventListener('click', validate);
form.addEventListener('submit', validate);