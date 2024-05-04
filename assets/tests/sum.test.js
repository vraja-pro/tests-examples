import { sum } from '../js/sum';

const testCases = [
    { a:1, b:2, expected:3 }, 
    { a:5, b:5, expected:10 },  
];

describe.each( testCases )('Sum function', ({a, b, expected}) => {
    test(`should add ${a} to ${b} to equal ${expected}`, () => {
        expect( sum(a, b) ).toBe(expected);
    });
});
