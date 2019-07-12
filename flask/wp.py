import arrow
import os
import requests


def get_posts(params = {}):
    return req('wp/v2/posts', params).json()

def get_post(slug, embed=True):
    posts = get_posts({"slug": slug, "_embed": embed})
    try:
        return posts[0]
    except IndexError:
        return None

def get_pages(params = {}):
    return req('wp/v2/pages', params).json()

def get_page(slug, embed=True):
    pages = get_pages({"slug": slug, "_embed": embed})
    try:
        return pages[0]
    except IndexError:
        return None

def get_recipe(id) :
    return req('wp/v2/recipes/' + id).json()

def get_site_info():
    return req('headless/v1/globals').json()

def req(path, params={}):
    return requests.get(os.path.join(os.environ.get('WP_API_URL'), path), params)
