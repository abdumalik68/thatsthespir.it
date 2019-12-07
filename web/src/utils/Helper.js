import API from "./Api";
import { navigate } from "@reach/router"

export function setQuoteFromSearch(data, callback = null) {
    window.scroll(0, 0);
    // console.log(data, "Quote from search / searchHandler");
    if (data.url.substring('author/')) {
        // data is incomplete if it's an author: let's fetch the full data.
        this.fetchData(data.url + '?fields=quotes', callback);
        // console.log(data, "setQuoteFromSearch");
        navigate('/' + data.url, { state: { data: data } });
    } else {
        this.setState({
            data: data,
            loading: false
        });
    }
}

export function fetchData(route, callback = null) {
    /** Contact the backend API to fetch content */
    this.setState({ loading: true });
    try {
        if ('quote/random' === route) {
            const randomTime = new Date().getTime();
            route += '?random=' + randomTime;
        }

        API.get(route)
            .then(response => {
                // console.log(response, "fetchQuote: api response");
                this.setState({ loading: false, data: response.data }, callback)
            })
            .catch(err => {
                // console.log(err);
                //this.setState({ loading: false });
                return null;
            });


        //this.setState((state, props) => ({ quote }))

    } catch (e) {
        alert(`😱 Axios request failed: ${e}`);
    }
}
