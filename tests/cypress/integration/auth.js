


Cypress.on('uncaught:exception', (err, runnable) => {
    // returning false here prevents Cypress from
    // failing the test
    return false
})



describe('Landingspagina bekijken ', () => {
it('De gebruiker kan de landingspagina bekijken', () => {
    cy.visit('/')
    cy.contains('Nieuwste artikelen')
  }
  );
});

describe('Vragen ', () => {
    it('De gebruiker kan de vragen overzicht bekijken', () => {
    cy.visit('/vragen/overzicht')

  });
    it('Vragen sorter op nieuwste', function () {
        cy.get('#filter').select('Nieuwste')
        cy.get('#filter').should('contain', 'Nieuwste')

    });


    it('Vragen filteren op categorie  ', function () {
        cy.visit('/vragen/overzicht')
        cy.get('select#name').select('PHP', { force: true })
        //wait for the new questions to load
        cy.wait(1000)
        cy.get('select#name').should('contain', 'kut')
    });

    it('Vragen zoeken  ', function () {
        cy.visit('/vragen/overzicht')
        cy.get('input').type('PHP')
        cy.get('input').should('have.value', 'PHP')
    });

    it('Vragen zoeken: geen vragen gevonden', function () {
        cy.visit('/vragen/overzicht')
        cy.get('input').type('Trui')
        cy.get('input').should('have.value', 'Trui')
        cy.contains('Geen vragen gevonden.')
    });

    it('Vraag bekijken', function () {
        cy.visit('/vragen/overzicht')
        cy.get('a').contains('Open').click()
    });
});

describe('Artikelen ', () => {
    it('De gebruiker kan de artikelen overzicht bekijken', () => {
        cy.visit('/artikel/overzicht')

    });

    it('Artikelen sorteren op nieuwste', function () {
        cy.visit('/artikel/overzicht')
        cy.get('#filter').select('Nieuwste')
        cy.get('#filter').should('contain', 'Nieuwste')

    });

    it('Artikelen filteren op categorie  ', function () {
        cy.visit('/artikel/overzicht')
        cy.get('select#name').select('PHP', { force: true })
        //wait for the new questions to load
        cy.wait(1000)
        cy.get('select#name').should('contain', 'PHP')
    });

    it('Artikelen zoeken  ', function () {
        cy.visit('/artikel/overzicht')
        cy.get('input').type('PHP')
        cy.get('input').should('have.value', 'PHP')
    });

    it('Artikelen zoeken: geen artikelen gevonden', function () {
        cy.visit('/artikel/overzicht')
        cy.get('input').type('Trui')
        cy.get('input').should('have.value', 'Trui')
        cy.contains('Er zijn nog geen artikelen')
    });

    it('Artikel bekijken', function () {
        cy.visit('/artikel/overzicht')
        cy.get('div.idea-container').first().click()

    });
});

describe('Auth', () => {

    it('Registreren gebruiker ', function () {
        cy.visit('/register')
        cy.get('input#name').type('Frans')
        cy.get('input#lastName').type('de boer')
        cy.get('input#email').type('frans' + Math.floor(Math.random() * 100) + '@test.com')
        cy.get('input#password').type('adminadmin')
        cy.get('input#password_confirmation').type('adminadmin')
        cy.get('button').contains('Registreren').click()

        cy.wait(1000)
    });

    it('Registreren gebruiker. Uitzondering: voornaam vergeten  ', function () {
        cy.visit('/register')
        cy.get('input#lastName').type('de boer')
        cy.get('input#email').type('frans' + Math.floor(Math.random() * 100) + '@test.com')
        cy.get('input#password').type('adminadmin')
        cy.get('input#password_confirmation').type('adminadmin')
        cy.get('button').contains('Registreren').click()
        cy.wait(1000)
    });

    it('Registreren gebruiker. Uitzondering: achternaam vergeten  ', function () {
            cy.visit('/register')
            cy.get('input#name').type('Frans')
            cy.get('input#email').type('frans' + Math.floor(Math.random() * 100) + '@test.com')
            cy.get('input#password').type('adminadmin')
            cy.get('input#password_confirmation').type('adminadmin')
            cy.get('button').contains('Registreren').click()
            cy.wait(1000)
        });

    it('Registreren gebruiker. Uitzondering: email vergeten  ', function () {
            cy.visit('/register')
            cy.get('input#name').type('Frans')
            cy.get('input#lastName').type('de boer')
            cy.get('input#password').type('adminadmin')
            cy.get('input#password_confirmation').type('adminadmin')
            cy.get('button').contains('Registreren').click()
            cy.wait(1000)
        });


    it('Registreren gebruiker. Uitzondering: wachtwoord vergeten  ', function () {
        cy.visit('/register')
        cy.get('input#name').type('Frans')
        cy.get('input#lastName').type('de boer')
        cy.get('input#email').type('frans' + Math.floor(Math.random() * 100) + '@test.com')
        cy.get('button').contains('Registreren').click()
        cy.wait(1000)
    });

    it('Registreren gebruiker. Uitzondering: wachtwoord niet herhalen  ', function () {
        cy.visit('/register')
        cy.get('input#name').type('Frans')
        cy.get('input#lastName').type('de boer')
        cy.get('input#email').type('frans' + Math.floor(Math.random() * 100) + '@test.com')
        cy.get('input#password').type('adminadmin')
        cy.get('button').contains('Registreren').click()
        cy.wait(1000)
    });

    it('Registreren gebruiker. Uitzondering: email bestaat al  ', function () {
        cy.visit('/register')
        cy.get('input#name').type('Frans')
        cy.get('input#lastName').type('de boer')
        cy.get('input#email').type('ramonsimon8@gmail.com')
        cy.get('input#password').type('adminadmin')
        cy.get('input#password_confirmation').type('adminadmin')
        cy.get('button').contains('Registreren').click()
        cy.wait(1000)
    });


});

describe('Vragen', () => {

    it('should login', () => {

        cy.visit('/login');
        cy.get('input[name="email"]').type('user@codepedia.nl');
        cy.get('input[name="password"]').type('admin');
        cy.contains('button', 'Inloggen').click();
        cy.wait(1000)
        Cypress.Cookies.defaults({
            preserve: "codepedia_session"
        })
    });

    it('Vraag overzicht bekijken', function () {
        cy.visit('/vragen/overzicht')
    });


    Cypress.Commands.add('setTinyMceContent', function (tinyMceId, content) {
        cy.window().should('have.property', 'tinymce'); // wait for tinyMCE
        cy.window().then(function (win) {
            var editor = win.tinymce.activeEditor;
            cy.wrap(editor)
                .should(function () {
                    var text = editor.getContent({ format: 'text' });
                })
                .then(function () {
                    editor.setContent(content, { format: 'text' });
                });
        });

    });

        it('Vraag toevoegen', function () {
            cy.visit('/vragen/overzicht')
            cy.wait(1000)
            cy.get('input#title').type('Laravel unkown online 0')
            // select category
            cy.get('select#onderwerp_keuze').select('Laravel')
            //run script to set tinyMCE content


            cy.get('input#test').type('Laravel unkown online 0');
            cy.contains('This is the new content').click()
            // run js code to get the value of the tinymce editor
            cy.get('button').contains('Stel vraag').click()
            //tinymce set content


        });


});
