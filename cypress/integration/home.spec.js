/// <reference types="cypress" />

describe('Carga la Página principal', ()=> {

    it('Prueba el header de la página principal', ()=>{
        cy.visit('/');

        cy.get('[data-cy="heading-sitio"]').should('exist');
        cy.get('[data-cy="heading-sitio"]').invoke('text').should('equals', 'Venta de Casas y Departamentos  Exclusivos de Lujo');
        cy.get('[data-cy="heading-sitio"]').invoke('text').should('not.equals', 'Bienes raices');
    });

    it('Prueba las bloque de los iconos', ()=> {
        cy.visit('/');

        cy.get('[data-cy="subheading-index"]').invoke('text').should('equals', 'Más Sobre Nosotros');
        cy.get('[data-cy="subheading-index"]').should('have.prop', 'tagName').should('equals', 'H2');

        cy.get('[data-cy="sesion-iconos"]').should('exist');
        cy.get('[data-cy="sesion-iconos"]').find('.icono').should('have.length', 3);
    });

    it('Pruebas bloque anuncios index', () => {
        cy.visit('/');

        cy.get('[data-cy="bloque-anuncios"]').should('exist');
        cy.get('[data-cy="bloque-anuncios"]').find('.anuncio').should('have.length', 3);

        cy.get('[data-cy="anuncio"]').should('exist');
        cy.get('[data-cy="anuncio"]').should('have.length', 3);
        cy.get('[data-cy="anuncio"]').should('not.have.length', 4);

        cy.get('[data-cy="enlace-anuncio"]').should('have.length', 3);
        cy.get('[data-cy="enlace-anuncio"]').should('have.class', 'boton-amarillo-block');
        cy.get('[data-cy="enlace-anuncio"]').should('not.have.class', 'boton-amarillo');
        cy.get('[data-cy="enlace-anuncio"]').first().invoke('text').should('equals', 'Ver Propiedad');

        cy.get('[data-cy="enlace-anuncio"]').first().click();
        cy.get('[data-cy="titulo-propiedad"]').should('exist');

        cy.wait(1); //1000 = 1 seg
        cy.go('back');
    });

    it('Prueba routing hacia todas las propiedades', () => {
        cy.visit('/');

        cy.get('[data-cy="ver-todas"]').should('exist');
        cy.get('[data-cy="ver-todas"]').should('have.class', 'boton-verde');
        cy.get('[data-cy="ver-todas"]').invoke('text').should('equals', 'Ver Todas');
        cy.get('[data-cy="ver-todas"]').should('not.have.class', 'boton-verde-block');
        cy.get('[data-cy="ver-todas"]').invoke('attr', 'href').should('equals', '/propiedades');

        cy.get('[data-cy="ver-todas"]').click();

        cy.wait(1);
        cy.go('back');
    });

    it('Pruebas en bloque de contacto', () => {
        cy.get('[meta-cy="bloque-contato"]').should('exist');
        cy.get('[meta-cy="bloque-contato"]').find('a').should('exist');
        cy.get('[meta-cy="bloque-contato"]').find('a').invoke('attr', 'href').should('equals', '/contacto');

        cy.get('[meta-cy="boton-contacto"]').should('exist');
        cy.get('[meta-cy="boton-contacto"]').invoke('attr', 'href').should('equals', '/contacto');
        cy.get('[meta-cy="boton-contacto"]').click();
        cy.wait(1);
        cy.go('back');

        cy.get('[meta-cy="bloque-contato"]').find('a').invoke('attr', 'href')
            .then(href => {
                cy.visit(href);
                cy.get('[meta-cy="sitio-contacto"]').should('exist');
                cy.visit('/');
            });       
    });

    it('Pruebas en bloque testimoneales', () => {
        cy.get('[meta-cy="bloque-mas"]').should('exist');
        cy.get('[meta-cy="bloque-mas"]').find('section').should('exist');
        cy.get('[meta-cy="bloque-mas"]').find('section').first().should('have.class', 'blog');
        cy.get('[meta-cy="bloque-mas"]').find('section').last().should('have.class', 'testimoniales');

    });

});