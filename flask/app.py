from flask import Flask
from flask import render_template, send_from_directory
from .wp import get_page, get_posts, get_post, get_site_info

app = Flask(__name__, )


def get_global_context():
    return {'site_info': get_site_info()}


@app.route('/<path:slug>')
def page(slug):
    page = get_page(slug)
    if not page:
        return render_template('404.html')
    return render_template('page.html', page=page, **get_global_context())


@app.route('/robots.txt')
def robots():
    return send_from_directory(app.static_folder, 'robots.txt')


@app.route('/')
def index():
    posts = get_posts()
    return render_template('index.html', posts=posts, **get_global_context())


if __name__ == '__main__':
    app.run(debug=True, host='0.0.0.0')
