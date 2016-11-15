(load "~/quicklisp/setup.lisp")
(ql:quickload :clack)

(defun app (env)
  `(200
    (:content-type "text/plain")
    ("hello world!")))


