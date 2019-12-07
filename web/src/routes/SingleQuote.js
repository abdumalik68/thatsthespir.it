import React from 'react';
import Quote from '../components/Quote';
import Search from '../components/Search';
import { fetchData, setQuoteFromSearch } from '../utils/Helper';

//import allQuotes from '../data/all_quotes_full.json';

class SingleQuote extends React.Component {

    constructor(props) {
        super(props);
        this.fetchData = fetchData.bind(this);
        this.setQuoteFromSearch = setQuoteFromSearch.bind(this);
        this.state = {
            data: {},
            loading: undefined
        };
    }
    componentDidMount() {
        if (!this.state.data.body && this.props.quoteSlug) {
            this.fetchData('/quote/' + this.props.quoteSlug);
        }
    }
    render() {

        return (
            <>
                <Quote quote={this.state.data} showAuthor={true} />
                <Search setQuoteHandler={this.setQuoteFromSearch} />
            </>
        )
    }
}


export default SingleQuote;
