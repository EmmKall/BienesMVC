describe('Envia un Hola Mundo', () => {
    it('Hola Mundo', () => {
        console.log('Hola Mundo');
    });

    it('Hola 2', () => {
        cy.visit('localhost:3000/');
    });
});