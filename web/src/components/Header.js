import React from 'react';
import { Nav, Navbar, Container, Row, Col } from 'react-bootstrap';
import { Link } from "@reach/router"

class Header extends React.Component {
    constructor(props) {
        super(props);
        // Set the state here. Use "props" if needed.
        this.state = {
            logged_in: false,
            user: {}
        };
        // Bind the event handler function, so that its // `this` binding isn't lost when it gets passed // to the button
        this.refreshAfterLogin = this.refreshAfterLogin.bind(this);
    }
    refreshAfterLogin(action) {
        console.log('Child says', action);
        // Replace actionCount with an incremented value
        this.setState({
            actionCount: this.state.actionCount + 1
        });
    }
    render() {
        return (
            <Container className="header" >
                <Row className="justify-content-between">
                    <Col xs={12} md={3} className="col-auto mr-auto">
                        <Navbar.Brand as={Link} to="/" className="mr-auto mt-3" onClick={this.props.homeButtonAction} >
                            That's the spirit!<br />
                            <small>Inspirational quotes for the creative soul.</small>
                        </Navbar.Brand>
                    </Col>
                    <Col xs={12} md={6} className="col-auto">
                        <Navbar expand="md" variant="light" bg="white" className="pr-0">
                            <Navbar.Toggle aria-controls="responsive-navbar-nav" id="toggle-button" />
                            <Navbar.Collapse id="responsive-navbar-nav">
                                <Nav as="ul" id="main-menu" className="pr-0 ml-auto">
                                    <Nav.Item as="li">
                                        <Nav.Link as={Link} to="/newsletter" style={{ position: 'relative' }}>Daily
                                    <span className="badge" title="You (will) have new mail!">1</span>
                                        </Nav.Link>
                                    </Nav.Item>
                                    <Nav.Item as="li">
                                        <Nav.Link as={Link} to="/suggest-a-quote" onClick={this.props.suggestAQuoteAction}>Suggest a Quote</Nav.Link>
                                    </Nav.Item>
                                    <Nav.Item as="li" className="pr-0 ">
                                        <Nav.Link as={Link} to="/hall-of-fame">Favs Chart</Nav.Link>
                                    </Nav.Item>
                                </Nav>
                            </Navbar.Collapse>
                        </Navbar>
                    </Col>
                </Row>
            </Container >
        )
    }
}


export default Header;
