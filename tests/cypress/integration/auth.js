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

describe('Vragen overzicht bekijken ', () => {
    it('De gebruiker kan de vragen overzicht bekijken', () => {
    cy.visit('/vragen/overzicht')

  });
    it('Vragen filteren op categorie  ', function () {
        cy.get('#name').select('kut')
        cy.clearLocalStorage()
        //wait for the new questions to load
        cy.wait(1000)
        cy.clearLocalStorage()
        cy.get('#name').should('have.value', 'kut')

    });

});


describe('Auth', () => {
    it('should login', () => {

        cy.visit('/login');
        cy.get('input[name="email"]').type('user@codepedia.nl');
        cy.get('input[name="password"]').type('admin');
        cy.contains('button', 'Inloggen').click();
        // click on button inloggen
    });
});
