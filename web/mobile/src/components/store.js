import { readable } from 'svelte/store';

//const apiURL = "http://localhost:8000/api";
const apiURL = "https://api.thatsthespir.it/v1/quotes/random";


const getData = async () => {
    const res = await fetch(apiURL);
    if (!res.ok) throw new Error('Bad response')
    const q = await res.json();
    return [q];
}


export const quotes = readable([], set => {
    // called when the store is first subscribed (when subscribers goes from 0 to 1)
    getData().then(set).catch(err => {
        console.error('Failed to fetch', err);
    })
    return () => {
        // you can do cleanup here if needed
    }
});

