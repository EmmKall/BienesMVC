/// <reference types="cypress" />

describe('Prueba la Navvegación y Routing', () => {
    it('Navegación Header', () => {
        cy.visit('/');

        cy.get('[meta-cy="nave-header"]').should('exist');
        cy.get('[meta-cy="nave-header"]').find('a').should('have.length', 4);
        cy.get('[meta-cy="nave-header"]').find('a').should('not.have.length', 6);

        cy.get('[meta-cy="nave-header"]').find('a').eq(0).invoke('attr', 'href').should('equals', '/nosotros');
        cy.get('[meta-cy="nave-header"]').find('a').eq(0).click();
        cy.go('back');
        cy.get('[meta-cy="nave-header"]').find('a').eq(1).invoke('attr', 'href').should('equals', '/propiedades');
        cy.get('[meta-cy="nave-header"]').find('a').eq(1).click();
        cy.go('back');
        cy.get('[meta-cy="nave-header"]').find('a').eq(2).invoke('attr', 'href').should('equals', '/blog');
        cy.get('[meta-cy="nave-header"]').find('a').eq(2).click();
        cy.go('back');
        cy.get('[meta-cy="nave-header"]').find('a').eq(3).invoke('attr', 'href').should('equals', '/contacto');
        cy.get('[meta-cy="nave-header"]').find('a').eq(3).click();
        cy.go('back');

    });

    it('Navegación Footer', () => {
        cy.visit('/');

        cy.get('[meta-cy="nave-footer"]').should('exist');

        cy.get('[meta-cy="nave-footer"]').find('a').should('have.length', 4);
        cy.get('[meta-cy="nave-footer"]').find('a').should('not.have.length', 5);

        cy.get('[meta-cy="nave-footer"]').find('a').eq(0).invoke('attr', 'href').should('equals', '/nosotros');
        cy.get('[meta-cy="nave-footer"]').find('a').eq(0).click();
        cy.go('back');
        cy.get('[meta-cy="nave-footer"]').find('a').eq(1).invoke('attr', 'href').should('equals', '/anuncios');
        cy.get('[meta-cy="nave-footer"]').find('a').eq(1).click();
        cy.go('back');
        cy.get('[meta-cy="nave-footer"]').find('a').eq(2).invoke('attr', 'href').should('equals', '/blog');
        cy.get('[meta-cy="nave-footer"]').find('a').eq(2).click();
        cy.go('back');
        cy.get('[meta-cy="nave-footer"]').find('a').eq(3).invoke('attr', 'href').should('equals', '/contacto');
        cy.get('[meta-cy="nave-footer"]').find('a').eq(3).click();
        cy.go('back');



    });
});