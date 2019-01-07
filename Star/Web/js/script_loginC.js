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



/* ----------------------------
    Validity Checks
    The arrays of validity checks for each input
    Comprised of three things
        1. isInvalid() - the function to determine if the input fulfills a particular requirement
        2. invalidityMessage - the error message to display if the field is invalid
        3. element - The element that states the requirement
---------------------------- */
var C_lastnameValidityChecks = [
    {
        isInvalid: function(input) {
            return input.value.length < 2;
        },
        invalidityMessage: 'กรุณากรองความยาวอย่างน้อย 2 ตัวอักษร',
        element: document.querySelector('label[for="C_lastname"] .input-requirements li:nth-child(1)')

    },
    {
        isInvalid: function(input) {
            var illegalCharacters = input.value.match(/[u0E01-u0E5B]/g);
            var illegalCharacters2 = input.value.match(/[^a-zA-Z]/g);
            
            if(!(illegalCharacters) || !(illegalCharacters2)){
                return false;
            }
            else{
                return true;
            }
            // return (illegalCharacters || illegalCharacters2) ? true : false;
        },
        invalidityMessage: 'กรุณากรองตัวอักษรภาษาไทยหรือภาษาอังกฤษ',
        element: document.querySelector('label[for="C_lastname"] .input-requirements li:nth-child(2)')
    }

];

var C_firstnameValidityChecks = [
    {
        isInvalid: function(input) {
            return input.value.length < 2;
        },
        invalidityMessage: 'กรุณากรองความยาวอย่างน้อย 2 ตัวอักษร',
        element: document.querySelector('label[for="C_firstname"] .input-requirements li:nth-child(1)')

    },
    {
        isInvalid: function(input) {
            var illegalCharacters = input.value.match(/[u0E01-u0E5B]/g);
            var illegalCharacters2 = input.value.match(/[^a-zA-Z]/g);
            
            if(!(illegalCharacters) || !(illegalCharacters2)){
                return false;
            }
            else{
                return true;
            }
        },
        invalidityMessage: 'กรุณากรองตัวอักษรภาษาไทย',
        element: document.querySelector('label[for="C_firstname"] .input-requirements li:nth-child(2)')
    }

];
var C_usernameValidityChecks = [
    {
        isInvalid: function(input) {
            return input.value.length < 2;
        },
        invalidityMessage: 'กรุณากรองความยาวอย่างน้อย 2 ตัวอักษร',
        element: document.querySelector('label[for="C_username"] .input-requirements li:nth-child(1)')
    },
    {
        isInvalid: function(input) {
            var illegalCharacters = input.value.match(/[^a-zA-Z0-9]/g);
            return illegalCharacters ? true : false;
        },
        invalidityMessage: 'กรุณากรองตัวอักษรภาษาอังกฤษหรือตัวเลข',
        element: document.querySelector('label[for="C_username"] .input-requirements li:nth-child(2)')
    }
];

var C_passwordValidityChecks = [
    {
        isInvalid: function(input) {
            return input.value.length < 8 | input.value.length > 50;
        },
        invalidityMessage: 'กรุณากรองความยาวอย่างน้อย 8 เเละไม่เกิน 50 ตัวอักษร',
        element: document.querySelector('label[for="C_password"] .input-requirements li:nth-child(1)')
    },
    // {
    //  isInvalid: function(input) {
    //      return !input.value.match(/[0-9]/g);
    //  },
    //  invalidityMessage: 'At least 1 number is required',
    //  element: document.querySelector('label[for="C_password"] .input-requirements li:nth-child(2)')
    // },
    // {
    //  isInvalid: function(input) {
    //      return !input.value.match(/[a-z]/g);
    //  },
    //  invalidityMessage: 'At least 1 lowercase letter is required',
    //  element: document.querySelector('label[for="C_password"] .input-requirements li:nth-child(3)')
    // },
    // {
    //  isInvalid: function(input) {
    //      return !input.value.match(/[A-Z]/g);
    //  },
    //  invalidityMessage: 'At least 1 uppercase letter is required',
    //  element: document.querySelector('label[for="C_password"] .input-requirements li:nth-child(4)')
    // },
    {
        // isInvalid: function(input) {
        //  return !input.value.match(/[\!\@\#\$\%\^\&\*_-A-Z]/g);
        // },
        isInvalid: function(input) {
            var illegalCharacters = input.value.match(/[^a-zA-Z0-9]/g);
            return illegalCharacters ? true : false;
        },
        invalidityMessage: 'กรุณากรองตัวอักษรภาษาอังกฤษหรือตัวเลข',
        element: document.querySelector('label[for="C_password"] .input-requirements li:nth-child(2)')
    }
];

var C_passwordRepeatValidityChecks = [
    {
        isInvalid: function() {
            return C_passwordRepeatInput.value != C_passwordInput.value;
        },
        invalidityMessage: 'กรุณายืนยันรหัสผ่านใหม่อีกครั้ง'
    }
];

var C_phoneValidityChecks = [
    {
        isInvalid: function(input) {

            var illegalCharacters = input.value.match(/[^0-9]/g);
            return illegalCharacters ? true : false;
        },
        invalidityMessage: 'กรุณากรองเบอร์โทรศัพท์',
        element: document.querySelector('label[for="C_phone"] .input-requirements li:nth-child(1)')
    }
];

/* ----------------------------
    Setup CustomValidation
    Setup the CustomValidation prototype for each input
    Also sets which array of validity checks to use for that input
---------------------------- */
// เช้คภาษาอังกฤษตัวเลขก้อได้ เเละมากกว่า 3 
var C_usernameInput = document.getElementById('C_username');
// เช้คภาษาอังกฤษเเละไทยเเละมากกว่า 3
var C_firstnameInput = document.getElementById('C_firstname');
// เช้คภาษาอังกฤษเเละไทยเเละมากกว่า 3
var C_lastnameInput = document.getElementById('C_lastname');
// เช้คภาษาอังกฤษตัวเลขก้อได้ เเละมากกว่า 8
var C_passwordInput = document.getElementById('C_password');
var C_passwordRepeatInput = document.getElementById('C_password_repeat');
//เช็คภาษาอังกฤษเเละอักขระ

var C_phoneInput = document.getElementById('C_phone');

C_usernameInput.CustomValidation = new CustomValidation(C_usernameInput);
C_usernameInput.CustomValidation.validityChecks = C_usernameValidityChecks;

C_firstnameInput.CustomValidation = new CustomValidation(C_firstnameInput);
C_firstnameInput.CustomValidation.validityChecks = C_firstnameValidityChecks;

C_lastnameInput.CustomValidation = new CustomValidation(C_lastnameInput);
C_lastnameInput.CustomValidation.validityChecks = C_lastnameValidityChecks;

C_passwordInput.CustomValidation = new CustomValidation(C_passwordInput);
C_passwordInput.CustomValidation.validityChecks = C_passwordValidityChecks;

C_passwordRepeatInput.CustomValidation = new CustomValidation(C_passwordRepeatInput);
C_passwordRepeatInput.CustomValidation.validityChecks = C_passwordRepeatValidityChecks;

C_phoneInput.CustomValidation = new CustomValidation(C_phoneInput);
C_phoneInput.CustomValidation.validityChecks = C_phoneValidityChecks;


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