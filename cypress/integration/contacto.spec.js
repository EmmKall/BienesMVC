/// <reference types="cypress" />

describe('Página contacto', () => {
    it('Contacto', () => {
        cy.visit('/contacto');

        cy.get('[meta-cy="sitio-contacto"]').should('exist');

        cy.get('[data-cy="formulario"]').should('exist');
    })

    it('Llena los campos del formulario', () => {
        cy.visit('/contacto');

        cy.get('[data-cy="input-nombre"]').should('exist');
        cy.get('[data-cy="input-nombre"]').type('Emm');

        cy.get('[data-cy="input-men"]').should('exist');
        cy.get('[data-cy="input-men"]').type('Quiero información sobre una casa bonita');

        cy.get('[data-cy="input-opc"]').should('exist');
        cy.get('[data-cy="input-opc"]').select('Compra');

        cy.get('[data-cy="input-pre"]').should('exist');
        cy.get('[data-cy="input-pre"]').type('2500000')
        
        cy.get('[data-cy="input-for"]').should('exist');
        cy.get('[data-cy="input-for"]').eq(0).check();

        cy.get('[meta-cy="tel"]').type('5512345678');
        cy.get('[meta-cy="fecha"]').type('2021-06-01');
        cy.get('[meta-cy="hora"]').type('13:00:00');

        /* cy.get('[data-cy="input-for"]').eq(1).check();
        cy.get('[data-cy="email"]').type('correo@correo.com'); */

        cy.get('[data-cy="formulario"]').submit();
        cy.get('[data-cy="res"]').should('exist');
        cy.get('[data-cy="res"]').should('have.class', 'exito');
        cy.get('[data-cy="res"]').invoke('text').should('equal', 'Se ha enviado el correo');

    });

});