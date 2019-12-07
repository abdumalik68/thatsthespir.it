import React from 'react';
import Search from '../components/Search';
import Quote from '../components/Quote';
import { setQuoteFromSearch, fetchData } from '../utils/Helper';


class Home extends React.Component {
  constructor(props) {
    super(props);
    this.fetchData = fetchData.bind(this);
    this.setQuoteFromSearch = setQuoteFromSearch.bind(this);
  }
  render() {

    return (
      <>
        <Quote quote={this.props.quote} showAuthor={true} />
        <Search setQuoteHandler={this.setQuoteFromSearch} />
      </>
    )
  };
}

export default Home;
