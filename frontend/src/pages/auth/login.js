import React, { Component } from 'react';
import Logo from '../../assets/images/logo.png';

class Login extends Component {
    render() {
        return (
            <div className="login-box">
                <div className="login-logo">
                    <img src={Logo} alt="Logo UFJF" className="img-fluid" />
                </div>
                <div className="card">
                    <div className="card-body login-card-body">
                        <p className="login-box-msg">Faça o login para iniciar sua sessão</p>
                        <form>
                            <div className="input-group mb-3">
                                <input type="email" className="form-control" placeholder="Email" />
                                <div className="input-group-append">
                                    <div className="input-group-text">
                                        <span className="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>
                            <div className="input-group mb-3">
                                <input type="password" className="form-control" placeholder="Password" />
                                <div className="input-group-append">
                                    <div className="input-group-text">
                                        <span className="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <div className="row">
                                <div className="col-8">
                                    <div className="icheck-primary">
                                        <input type="checkbox" id="remember" />
                                        <label for="remember" className="ml-1"> Lembrar-me</label>
                                    </div>
                                </div>
                                <div className="col-4">
                                    <button type="button" className="btn btn-primary btn-block">Login</button>
                                </div>
                            </div>
                        </form>
                        <hr />
                        <p className="mb-1">
                            <a href="/reset">Esqueci minha senha</a>
                        </p>
                        <p className="mb-0">
                            <a href="/register" className="text-center">Cadastre-se</a>
                        </p>
                    </div>
                </div>
            </div>
        );
    }
}

export default Login;