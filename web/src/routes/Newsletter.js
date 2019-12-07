import React from 'react';
import { Container, Row, Col } from 'react-bootstrap';

const Newsletter = () => (

    <Container className="content">
        <Row>
            <Col><h1 className="topline">A daily dose of Spirit in your mailbox to start the day?</h1>
            </Col>
        </Row>
        <Row>
            <Col md={3}>
                <img src="/assets/images/Screenshot_2015-06-01-23-34-00.png" alt="" style={{ maxWidth: '100%' }} className="image-drop-shadow" />
            </Col>
            <Col md={9}>
                <p>Receive a quote from The Spirit! in your mailbox every day in the morning. It will make you feel...</p>
                <p>Mmmmmmmmmh, nice.</p>
                <p>Like that.</p>
                <div id="mc_embed_signup">
                    <form action="//pixeline.us2.list-manage.com/subscribe/post?u=47aa7bd611cb197be236cd3b2&amp;id=8a917f2ce3" method="post" id="mc-embedded-subscribe-form">
                        <div id="mc_embed_signup_scroll">
                            <div className="mc-field-group">
                                <label>Your Email Address</label>
                                <input type="email" name="EMAIL" className="required email" id="mce-EMAIL" aria-required="true" />
                            </div>
                            <p className="meta">Powered by <a href="http://eepurl.com/N-Z79" title="MailChimp - email marketing made easy and fun">MailChimp</a><br /><small>
                                (Each email contains an unsubscribe link, should this ever get annoying.)</small></p>
                            <div style={{ position: 'absolute', left: '-5000px' }}><input type="text" name="b_47aa7bd611cb197be236cd3b2_8a917f2ce3" tabIndex="-1" /></div>
                            <div className="clear">
                                <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" className="button" /></div>
                        </div>
                    </form>
                </div>
            </Col>
        </Row>
    </Container>
)


export default Newsletter;
