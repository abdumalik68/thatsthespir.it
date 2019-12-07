import React, { Component } from 'react';

class Share extends Component {

    isBrowser() {
        return !(typeof document === "undefined" || typeof window === "undefined");
    }

    render() {
        let url = '/' + this.props.quote.url;
        //  if (!url && this.isBrowser()) { url = window.location.href; }

        const redditProps = {
            url,
            text: this.props.quote.body,
        };

        const twitterProps = { ...redditProps };
        const pinterestProps = { ...redditProps, imagePath: '/uploads/' + this.props.quote.photo }
        const linkedinProps = { ...redditProps, title: this.props.quote.fullname }
        const heartsProps = {
            url,
            total_likes: this.props.quote.total
        }

        return (
            <p className="share-buttons">
                <a className="quote-permalink" href={url}>#{this.props.quote.quote_id}</a>
                <span className="horiz-sep">|</span>
                {this.props.quote.source ? <span className="source"><a target="_blank" rel="noopener noreferrer" href={this.props.quote.source}>source</a><span className="horiz-sep">|</span></span> : null}

                <FacebookShareButton url={url} />
                <TwitterShareButton {...twitterProps} />
                <PinterestShareButton {...pinterestProps} />
                <LinkedinShareButton {...linkedinProps} />
                <RedditShareButton {...redditProps} />
                <span className="horiz-sep">|</span>
                <HeartsButton {...heartsProps} />
            </p>
        )
    }
}

const FacebookShareButton = ({ url }) => (
    <a rel="nofollow" className="social facebook" href={`//www.facebook.com/sharer/sharer.php?u=${url}`} title="Share this quote on Facebook">
        <img src="/assets/images/facebook.svg" alt="" />
    </a>
);

const TwitterShareButton = ({ url, text }) => (
    <a rel="nofollow" className="social twitter" href={`http://twitter.com/share?text=${text}&amp;url=${url}&amp;hashtags=design_quote`} title="Share this quote on Twitter">
        <img src="/assets/images/twitter.svg" alt="" />
    </a>
);

const RedditShareButton = ({ url, text }) => (
    <a rel="nofollow" className="social reddit" data-height="420" data-network="reddit" data-width-normal="540" data-width="845" href={`//www.reddit.com/submit?url=${url}&amp;title=${text}`} title="Share this quote on Reddit">
        <img src="/assets/images/reddit.svg" width="19" height="15" alt="" />
    </a>
)

const PinterestShareButton = ({ url, text, imagePath }) => (
    <a rel="nofollow" className="social pinterest" href={`https://pinterest.com/pin/create/button/?url=${url}&amp;media=${imagePath}&amp;description=${url}`} title="Share this quote on Pinterest"><img src="/assets/images/pinterest.svg" alt="" /></a>

)

const LinkedinShareButton = ({ url, text, title }) => (
    <a rel="nofollow" className="social linkedin" href={`https://www.linkedin.com/shareArticle?mini=true&amp;url=${url}&amp;title=${title}&amp;summary=${text}&amp;source=${url}`} title="Share this quote on LinkedIn"><img src="/assets/images/linkedin.svg" alt="" /></a>

)

const HeartsButton = ({ url, total_likes }) => (
    <a rel="nofollow"
        className="social favourite"
        href={`${url}#login-ui`}
        title="Favourite this quote so you can easily find it later. ">
        <em>Save it ?</em>
        <span className="total_likes">{total_likes}</span>
    </a>
)

export default Share;
