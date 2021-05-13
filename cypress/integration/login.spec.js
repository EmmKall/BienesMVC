/// <reference types="cypress" />

describe('probando autenticación', () => {
    it('Autenticación Login', () => {
        cy.visit('/login');

        cy.get('[meta-cy="bloque-auth"]').should('exist');

        cy.get('[meta-cy="form-login"]').should('exist');

        //Ambos campos obligatorios
        cy.get('[meta-cy="form-login"]').submit();
        cy.get('[meta-cy="error-login" ]').should('exist');
        cy.get('[meta-cy="error-login" ]').eq(0).should('have.class', 'error');
        cy.wait(1000);

        cy.get('[meta-cy="email"]').should('exist');

        cy.get('[meta-cy="pass"]').should('exist');


    });
});